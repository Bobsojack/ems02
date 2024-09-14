<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'equipment_id',
        'SerialNo',
        'NameEquipment',
        'cost',
        'location',
        'status',
        'borrowed_date',
        'returned_date',
    ];
}
