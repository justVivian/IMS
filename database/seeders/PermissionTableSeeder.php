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
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'kategori-list',
           'kategori-create',
           'kategori-edit',
           'kategori-delete',
           'merk-list',
           'merk-create',
           'merk-edit',
           'merk-delete',
           'size-list',
           'size-create',
           'size-edit',
           'size-delete',
           'warna-list',
           'warna-create',
           'warna-edit',
           'warna-delete',
           'barang-list',
           'barang-create',
           'barang-edit',
           'barang-delete',
           'masuk-list',
           'masuk-create',
           'masuk-edit',
           'masuk-delete',
           'keluar-list',
           'keluar-create',
           'keluar-edit',
           'keluar-delete',
           'retur-list',
           'retur-create',
           'retur-edit',
           'retur-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}