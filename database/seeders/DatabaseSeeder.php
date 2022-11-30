<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wilayah;
use App\Models\Pegawai;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Pendaftaran;
use App\Models\Tindakan;
use App\Models\Tagihan;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id_pegawai' => '1',
            'email' => 'test123@example.com',
            'password' => bcrypt('123')
        ]); 

        Wilayah::create([
            'nama_wilayah' => 'Bandung'
        ]);
        Wilayah::create([
            'nama_wilayah' => 'Jakarta'
        ]);
        Wilayah::create([
            'nama_wilayah' => 'Surabaya'
        ]);                         
        
        Pegawai::create([
            'nama_pegawai' => 'test',
            'notelp' => '123123123',
            'tgl_lahir' => '1998-01-01',
            'alamat' => 'alamat',
            'id_wilayah' => '1'
        ]); 

        Pasien::create([
            'nama_pasien' => 'test pasien',
            'notelp' => '123123123',
            'tgl_lahir' => '1998-01-01',
            'alamat' => 'alamat',
            'id_wilayah' => '1'
        ]);  

        Obat::create([
            'nama_obat' => 'test obat',
            'harga' => '10000'
        ]);  
        
        Pendaftaran::create([
            'tgl_pendaftaran' => '2022-11-11',
            'id_pasien' => '1'
        ]);  
        
        Tindakan::create([
            'id_pasien' => '1',
            'nama_tindakan' => 'Check Up',
            'tarif_tindakan' => '10000',
            'id_obat' => '1',
            'jumlah' => '1'
        ]);  
        
        Tagihan::create([
            'id_tindakan' => '1',
            'tgl_tagihan' => '2022-11-11',
            'invoice' => 'INV-1-1111'
        ]);          
    }
}
