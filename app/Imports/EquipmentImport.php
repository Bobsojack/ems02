<?php

namespace App\Imports;

use App\Models\equipment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class EquipmentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        dd($row);
        if (isset($row['startingdate']) && is_numeric($row['startingdate'])) {
            $startingDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['startingdate'])->format('Y-m-d');
        } else {
            // กำหนดค่าหรือจัดการกรณีที่ค่าไม่ถูกต้องตามที่ต้องการ
            \Log::warning('Invalid date format for startingdate:', ['startingdate' => $row['startingdate']]);
            $startingDate = null; // หรือกำหนดค่าเริ่มต้นอื่น ๆ ตามต้องการ
        }
        $cost = (float) $row['costbaht'];
        $maxCost = 99999999.99; // Adjust based on your column definition

        if (!is_numeric($cost) || $cost > $maxCost) {
            \Log::warning('Cost value out of range:', ['cost' => $cost]);
            $cost = $maxCost; // Or handle the value as needed
        }
        return new Equipment([
            'GroupofEquipment' => $row['group_of_equipment']?? '',
            'SerialNo' => $row['serialno'] ?? '',
            'NameEquipment' => $row['name']?? '',
            'cost' => $cost,
            'location' => $row['location'] ?? '',
            'StartingDate' => $startingDate,
            'Status' => $row['status'] ?? '', // ใช้ค่าเริ่มต้นถ้า Status เป็น null
            'Company' => $row['company'] ?? '',
        ]);
    }
    
    // private $current = 0 ;
    // public function model(array $row)
    // {
    //     dd($row);
    //     \Log::info('Row Data: ' . json_encode($row));
    //     try {
    //         return new equipment([
    //             'GroupofEquipment' => $row['group_of_equipment'],
    //             'SerialNo' => $row['serial_no'],
    //             'NameEquipment' => $row['name'],
    //             'cost' => $row['cost_baht'],
    //             'location' => $row['location'],
    //             'StartingDate' => $row['starting_date'],
    //             'Status' => $row['status'],
    //             'Company' => $row['company'],
    //         ]);
    //     } catch (\Exception $e) {
    //         \Log::error('Error processing row: ' . json_encode($row) . ' | Error: ' . $e->getMessage());
    //     }
    // } 
    // return new Equipment([
    //     'group_of_equipment' => $row['group_of_equipment'],
    //     'serial_no' => $row['serial_no'],
    //     'name' => $row['name'],
    //     'cost_baht' => $row['cost_baht'], // Updated name
    //     'location' => $row['location'],
    //     'starting_date' => $row['starting_date'],
    //     'status' => $row['status'],
    //     'search_name' => $row['search_name'], // Updated name
    //     'current' => $row['current'], // Updated name
    //     'company' => $row['company'],
    //     'model' => $row['model'],
    //     'operation' => $row['operation'], // Updated name
    //     'tax' => $row['tax'], // Updated name
    // ]);

    // }
    // {
    //     return new Equipment([
    //         'group_of_equipment' => $row[0],
    //         'serial_no' => $row[1],
    //         'name' => $row[2],
    //         'cost_baht' => $row[3],
    //         'location' => $row[4],
    //         'starting_date' => $row[5],
    //         'status' => $row[6],
    //         'search_name_current' => $row[7],
    //         'company' => $row[8],
    //         'model' => $row[9],
    //         'operation' => $row[10],
    //         'tax' => $row[11],
    //     ]);
    // }
//     public function model(array $row)
// {
    // $this->current++;
    // if( $this->current > 1){
    //     $equipment = new equipment();
    //     $equipment->group_of_equipment =  $row[0];
    //     $equipment->serialNo =  $row[1];
    //     $equipment->name =  $row[2];
    //     $equipment->cost_baht =  $row[3];
    //     $equipment->location =  $row[4];
    //     $equipment->StartingDate =  $row[5];
    //     $equipment->Status =  $row[6];
    //     $equipment->ชื่อสำหรับค้นหา =  $row[7];
    //     $equipment->ปัจจุบัน =  $row[8];
    //     $equipment->Company =  $row[9];
    //     $equipment->Model =  $row[10];
    //     $equipment->การดำเนินการงาน =  $row[11];
    //     $equipment->ภาษี =  $row[12];
    //     $equipment->save();
    // } 
    // Debugging the row data
    // \Log::info('Processing row: ' . json_encode($row));
    // dd($row);
    // Ensure a model instance is returned
//     return new Equipment([
//         'group_of_equipment' => $row[0],
//         'serialNo' => $row[1],
//         'name' => $row[2],
//         'cost(baht)' => $row[3],
//         'location' => $row[4],
//         'StartingDate' => $row[5],
//         'Status' => $row[6],
//         'ชื่อสำหรับค้นหา' => $row[7],
//         'ปัจจุบัน' => $row[8],
//         'Company' => $row[9],
//         'Model' => $row[10],
//         'การดำเนินการงาน' => $row[11],
//         'ภาษี' => $row[12],
//     ]);
// }

}
