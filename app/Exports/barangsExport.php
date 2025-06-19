<?php

namespace App\Exports;

use App\Models\barangs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class barangsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return barangs::all();
         return barangs::select("nama", "categorys_id", "satuans_id","stok","harga")->get();
        
    }

    public function headings(): array

    {

        return ['Nama', 'Kategori', 'Satuan','Stok','Harga'];

    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Apply bold font to the first row
            1 => ['font' => ['bold' => true]],
        ];
    }
}
