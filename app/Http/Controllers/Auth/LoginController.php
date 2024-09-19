<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view("auth/login");
    }
  public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|',
            'password' => 'required',

        ]);


        if ($validator->passes()) {
            if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password])) {
                // ตรวจสอบบทบาทของผู้ใช้ที่เข้าสู่ระบบว่าไม่ใช่ "admin"
                if (Auth::guard()->user()->role == "Admin") {
                    // ล็อกเอาท์และเปลี่ยนเส้นทางไปยังหน้าล็อกอินพร้อมข้อความแสดงข้อผิดพลาด
                    
                    return redirect()->route('admin.dashboard');
                }
                // เปลี่ยนเส้นทางไปยังแดชบอร์ดของผู้ดูแลระบบเมื่อเข้าสู่ระบบสำเร็จ
                return redirect()->route('users/Home');
            } else {
                // เปลี่ยนเส้นทางกลับพร้อมข้อความแสดงข้อผิดพลาดหากการยืนยันตัวตนล้มเหลว
                return redirect()->route('index.login')->with('error', 'You are not authorized to access this page.');
            }
        } 
       
        
        
        else {
            // เปลี่ยนเส้นทางกลับพร้อมข้อผิดพลาดการยืนยันข้อมูลหากการยืนยันล้มเหลว
            return redirect()->route('index.login')
                ->withInput()
                ->withErrors($validator);
        }

        



    }


}
