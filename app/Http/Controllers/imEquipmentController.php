<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipment;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EquipmentImport;

class imEquipmentController extends Controller
{
    // แสดงหน้า view สำหรับการดูข้อมูล
    public function view()
    {
        return view('importems'); 
    }
    // public function addview()
    // {
    //     return view('admin/addems'); // ต้องตรงกับชื่อ view ที่คุณต้องการแสดง
    // }

    // บันทึกข้อมูล Equipment ลงในฐานข้อมูล
    public function store(Request $request)
    {
        // ตรวจสอบความถูกต้องของข้อมูลที่รับเข้ามา
        $validator = Validator::make($request->all(), [
            'GroupofEquipment' => 'required',
            'SerialNo' => 'required',
            'NameEquipment' => 'required',
            'cost' => 'required|numeric',
            'location' => 'required',
            'StartingDate' => 'required|date',
            'Status' => 'required',
            'Company' => 'required',
        ]);

        // ถ้า Validate ไม่ผ่าน
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // บันทึกข้อมูลลงในฐานข้อมูล
        $equipment = new equipment();
        $equipment->GroupofEquipment = $request->GroupofEquipment;
        $equipment->SerialNo = $request->SerialNo;
        $equipment->NameEquipment = $request->NameEquipment;
        $equipment->cost = $request->cost;
        $equipment->location = $request->location;
        $equipment->StartingDate = $request->StartingDate;
        $equipment->Status = $request->Status;
        $equipment->Company = $request->Company;
        $equipment->save();

        // ส่งกลับหน้าที่แล้วพร้อมกับข้อความแจ้งเตือน
        // return back()->with('success', 'Equipment successfully added.');
        return redirect()->route('equipment.show')->with('success', 'Equipment updated successfully.');
    }
    public function import(Request $request)
    {
        {
            Excel::import(new EquipmentImport, $request->file('file'));
    
            return redirect()->back()->with('success', 'Data Imported Successfully!');
        }
        // Excel::import(new EquipmentImport, $request->file('file'));
        // // dd(Equipment::all());

        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls',
        // ]);

        // Excel::import(new EquipmentImport, $request->file('file'));

        // return back()->with('success', 'Data imported successfully.');
    }
    public function destroy($equipment_id)
    {
        $equipment = Equipment::where('equipment_id', $equipment_id)->firstOrFail();
        $equipment->delete();

        return response()->json(['success' => 'Equipment deleted successfully.']);
    }
    public function edit($equipment_id)
    {
        $equipment = Equipment::where('equipment_id', $equipment_id)->firstOrFail();

        return view('equiment.edit', compact('equipment'));
    }
    public function update(Request $request, $equipment_id)
    {
        $request->validate([
            'GroupofEquipment' => 'required|string',
            'SerialNo' => 'required|string',
            'NameEquipment' => 'required|string',
            'cost' => 'required|numeric',
            'location' => 'required|string',
            'StartingDate' => 'required|date',
            'Status' => 'required|string',
            'Company' => 'required|string',
        ]);

        $equipment = Equipment::where('equipment_id', $equipment_id)->firstOrFail();
        $equipment->update($request->all());

        return redirect()->route('equipment.show')->with('success', 'Equipment updated successfully.');
    }
}
