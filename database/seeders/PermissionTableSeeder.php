<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
          /*  'simpanan-list',
           'simpanan-create',
           'simpanan-edit',
           'simpanan-delete',
           'pembiayaan-list',
           'pembiayaan-create',
           'pembiayaan-edit',
           'pembiayaan-delete',
           'unit-list',
           'unit-create',
           'unit-edit',
           'unit-delete',
           'profile-list',
           'profile-create',
           'profile-edit',
           'profile-delete',
           'karyawan-list',
           'karyawan-create',
           'karyawan-edit',
           'karyawan-delete',
           'pengurus-list',
           'pengurus-create',
           'pengurus-edit',
           'pengurus-delete',
           'anggota-list',
           'anggota-create',
           'anggota-edit',
           'anggota-delete',
           'buku_besar-list',
           'buku_besar-create',
           'buku_besar-edit',
           'buku_besar-delete',
           'jurnal-list',
           'jurnal-create',
           'jurnal-edit',
           'jurnal-delete',
           'coa-list',
           'coa-create',
           'coa-edit',
           'coa-delete',
           'shu-list',
           'shu-create',
           'shu-edit',
           'shu-delete',
           'transaksi_pembiayaan-list',
           'transaksi_pembiayaan-create',
           'transaksi_pembiayaan-edit',
           'transaksi_pembiayaan-delete',
           'pembiayaan_anggota-list',
           'pembiayaan_anggota-create',
           'pembiayaan_anggota-edit',
           'pembiayaan_anggota-delete',
           'transaksi_tabungan-list',
           'transaksi_tabungan-create',
           'transaksi_tabungan-edit',
           'transaksi_tabungan-delete',
           'tabungan_anggota-list',
           'tabungan_anggota-create',
           'tabungan_anggota-edit',
           'tabungan_anggota-delete',
           'transaksi_simpanan-list',
           'transaksi_simpanan-create',
           'transaksi_simpanan-edit',
           'transaksi_simpanan-delete',
           'simpanan_anggota-list',
           'simpanan_anggota-create',
           'simpanan_anggota-edit',
           'simpanan_anggota-delete',
           'berita-list',
           'berita-create',
           'berita-edit',
           'berita-delete', 
           'anggota-profile',*/
           'pembiayaan_anggota-storeusulan'
           
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
