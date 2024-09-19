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

                    'equipment_id' => Equipment::where('serial_no', $item['serial_no'])->first()->equipment_id, // หาค่า equipment_id จาก SerialNo
                    'serial_no' => $item['serial_no'],
                    'equipment_name' => $item['equipment_name'],
                    'building_no' => $item['building_no'],
                    'room_no' => $item['room_no'],



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
