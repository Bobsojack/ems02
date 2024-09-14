<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EquipmentExport;
use App\Models\equipment;
use App\Models\user;
class EquipmentController extends Controller
{
    
    public function show(Request $request)
    {
        $equipments = DB::table('equipment')->get();

        // return response()->json(['data' => $equipments], 200);
        return view('admin/AdminEquipment02',['equipments' => $equipments]);

    }
    public function showname(Request $request)
    {
        $users = DB::table('users')->get();

        // return response()->json(['data' => $equipments], 200);
        return view('users/go',['users' => $users]);

    }
    public function showUser(Request $request)
    {
        $equipments = DB::table('equipment')->get();

        // return response()->json(['data' => $equipments], 200);
        return view('users/Userequipment',['equipments' => $equipments]);

    }
    public function borrowshow(Request $request)
    {
        $equipments = DB::table('equipment')->get();

        // return response()->json(['data' => $equipments], 200);
        return view('users/Userborrow',['equipments' => $equipments]);

    }
    public function export()
    {
        return Excel::download(new EquipmentExport, 'equipment.xlsx');
    }
    public function deleteMultiple(Request $request)
    {
        // Validate that the request contains an array of IDs
        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:equipments,id', // Assuming the table is named 'equipments'
        ]);

        // Retrieve the IDs from the request
        $ids = $request->input('ids');

        // Delete the records
        equipment::whereIn('id', $ids)->delete();

        // Return a response indicating success
        return response()->json(['success' => 'Selected equipment deleted successfully.']);
    }
}