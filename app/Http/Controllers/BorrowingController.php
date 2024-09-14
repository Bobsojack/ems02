<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Equipment;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function store(Request $request)
    {
        // ข้อมูลการยืมทั้งหมดจากฟอร์ม
        $borrowingData = $request->input('borrowing');

        // วนลูปข้อมูลรายการที่เลือกเพื่อบันทึกลงในฐานข้อมูล
        foreach ($borrowingData['items'] as $item) {
            Borrowing::create([
                'user_id' => auth()->id(), // เก็บ User ID ของผู้ที่ยืม
                'equipment_id' => Equipment::where('SerialNo', $item['serialNo'])->first()->id, // หาค่า equipment_id จาก SerialNo
                'SerialNo' => $item['serialNo'],
                'NameEquipment' => $item['name'],
                'cost' => $item['cost'],
                'location' => $item['location'],
                'status' => 'รอ', // สถานะเริ่มต้นคือ "รอ"
                'borrowed_date' => $borrowingData['start_date'], // วันที่เริ่มยืม
                'returned_date' => $borrowingData['end_date'],   // วันที่คืน
            ]);
        }

        return response()->json(['message' => 'Borrowing record created successfully']);
    }
}
