<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        DB::table('kecamatan')->insert([
            'nama' => 'Gabek'
        ]);
        DB::table('kecamatan')->insert([
            'nama' => 'Bukit Intan'
        ]);
        DB::table('kecamatan')->insert([
            'nama' => 'Gerunggang'
        ]);
        DB::table('kecamatan')->insert([
            'nama' => 'Girimaya'
        ]);
        DB::table('kecamatan')->insert([
            'nama' => 'Pangkal Balam'
        ]);
        DB::table('kecamatan')->insert([
            'nama' => 'Rangkui'
        ]);
        DB::table('kecamatan')->insert([
            'nama' => 'Taman Sari'
        ]);
    }
}
