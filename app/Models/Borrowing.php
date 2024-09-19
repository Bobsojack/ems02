<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'equipment_id',
        'serial_no',
        'equipment_name',
        'building_no',
        'room_no',
        'status',
        'status_borrow',
        'borrowed_date',
        'returned_date',
    ];
}
