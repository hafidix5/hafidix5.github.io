<?php

namespace App\Imports;

use App\Models\barangs;
use App\Models\categorys;
use App\Models\satuans;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class barangsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
       
        $id = IdGenerator::generate(['table' => 'barangs', 'field' => 'id', 'length' => 20, 'prefix' => 'br-']);
        $idcategory = IdGenerator::generate(['table' => 'categorys', 'field' => 'id', 'length' => 3, 'prefix' => 'c']);
        $idsatuan = IdGenerator::generate(['table' => 'satuans', 'field' => 'id', 'length' => 3, 'prefix' => 's']);
        /* return new barangs([
            'id' => $id,
            'nama' => $row[0],
            'categorys_id' => $row[1],
            'satuans_id' => $row[2],
            'stok' => $row[3],
            'harga' => $row[4],
        ]); */
        
        return new barangs([
            'id' => $id,
            'nama' => $row[0],
        
            // Get or create Category
            'categorys_id' => categorys::firstOrCreate(
                ['nama' => $row[1]],
                ['id' => $idcategory, 'nama' => $row[1]] // Data to insert if not found (with custom ID) // Search by name
            )->id, // Return the ID
            // Get or create Satuan
            'satuans_id' => satuans::firstOrCreate(
                ['nama' => $row[2]], // Search by name
                ['id' => $idsatuan, 'nama' => $row[2]]
            )->id, // Return the ID
        
            'stok' => $row[3],
            'harga' => $row[4],
        ]);
       /*  return new barangs([
            'id' => IdGenerator::generate([
                'table' => 'barangs',
                'field' => 'id',
                'length' => 10,
                'prefix' => 'B-', 
            ]),
        
            'nama' => $row[0],
        
            // Get or create Category with a custom ID
            'categorys' => categorys::firstOrCreate(
                ['nama' => strtolower($row[1])], // Search criteria
                ['id' => IdGenerator::generate([
                    'table' => 'categorys',
                    'field' => 'id',
                    'length' => 4,
                    'prefix' => 'C-',
                ])]
            )->id, 
        
            // Get or create Satuan with a custom ID
            'satuans' => satuans::firstOrCreate(
                ['nama' => strtolower($row[2])], // Search criteria
                ['id' => IdGenerator::generate([
                    'table' => 'satuans',
                    'field' => 'id',
                    'length' => 4,
                    'prefix' => 'S-',
                ])]
            )->id,
        
            'stok' => $row[3],
            'harga' => $row[4],
        ]); */
    }
}
