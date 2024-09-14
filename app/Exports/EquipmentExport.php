<?php
namespace App\Exports;

use App\Models\Equipment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EquipmentExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Equipment::all();
    }

    public function headings(): array
    {
        return [
            'group_of_equipment',
            'serialno',
            'name',
            'costbaht',
            'location',
            'startingdate',
            'status',
            'company',
        ];
    }

    public function map($equipment): array
    {
        return [
            $equipment->GroupofEquipment,
            $equipment->SerialNo,
            $equipment->NameEquipment,
            $equipment->cost,
            $equipment->location,
            $equipment->StartingDate,
            $equipment->Status,
            $equipment->Company,
        ];
    }
}
