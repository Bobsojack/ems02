<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use DB;

class BorrowController extends Controller
{
    // Display all equipment
    public function index()
    {
        $equipments = Equipment::all(); // Fetch all equipment
        return view('borrow', compact('equipments'));
    }

    // Handle borrowing process
    public function borrow(Request $request)
    {
        $data = $request->input('borrowing');

        DB::table('borrowings')->insert([
            'items' => json_encode($data['items']),
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'status' => $data['status'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Borrowing successfully recorded.']);
    }
}
