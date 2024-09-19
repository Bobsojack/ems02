<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    // protected $table = 'equipment'; // ถ้าชื่อตารางไม่ได้ตั้งเป็น 'equipment' ต้องระบุให้ตรงกับชื่อตารางจริง
    protected $primaryKey = 'equipment_id';
    use HasFactory;

    protected $fillable = [
        'year',
        'equipment_group',
        'serial_no',
        'equipment_name',
        'cost',
        'buy_date',
        'department_name',
        'building_no',
        'room_no',
        'status',
        'create_time',
        'create_by',
        'update_time',
        'update_by'
    ];
}
