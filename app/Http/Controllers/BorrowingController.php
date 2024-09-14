<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Equipment;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function borrow(Request $request)
    {
        try {
            // ข้อมูลการยืมทั้งหมดจากฟอร์ม
            $borrowingData = $request->json()->all();
            foreach ($borrowingData as $item) {
                Borrowing::create([
                    'user_id' => auth()->id(), // เก็บ User ID ของผู้ที่ยืม
                    'equipment_id' => Equipment::where('SerialNo', $item['serialNo'])->first()->equipment_id, // หาค่า equipment_id จาก SerialNo
                    'SerialNo' => $item['serialNo'],
                    'NameEquipment' => $item['name'],
                    'cost' => $item['cost'],
                    'location' => $item['location'],
                    'status' => 'รอ', // สถานะเริ่มต้นคือ "รอ"
                    'borrowed_date' => $item['start_date'], // วันที่เริ่มยืม
                    'returned_date' => $item['end_date'],   // วันที่คืน
                ]);
            }
            return response()->json(['success' => true, 'message' => 'Borrowing record created successfully ']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
