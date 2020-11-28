<?php

use Illuminate\Database\Seeder;
use App\Biaya;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //data biaya
        Biaya::insert([
            [
                'ukuran_min' => 0,
                'ukuran_max' => 10,
                'biaya' => 100000,
                'keterangan' => 'Up to 10 cm'
            ],
            [
                'ukuran_min' => 11,
                'ukuran_max' => 15,
                'biaya' => 150000,
                'keterangan' => '11 - 15 cm'
            ],
            [
                'ukuran_min' => 16,
                'ukuran_max' => 20,
                'biaya' => 200000,
                'keterangan' => '16 - 20 cm'
            ],
            [
                'ukuran_min' => 21,
                'ukuran_max' => 25,
                'biaya' => 250000,
                'keterangan' => '21 - 25 cm'
            ],
            [
                'ukuran_min' => 26,
                'ukuran_max' => 30,
                'biaya' => 300000,
                'keterangan' => '26 - 30 cm'
            ],
            [
                'ukuran_min' => 31,
                'ukuran_max' => 35,
                'biaya' => 350000,
                'keterangan' => '31 - 35 cm'
            ],
            [
                'ukuran_min' => 36,
                'ukuran_max' => 40,
                'biaya' => 400000,
                'keterangan' => '36 - 40 cm'
            ],
            [
                'ukuran_min' => 41,
                'ukuran_max' => 45,
                'biaya' => 450000,
                'keterangan' => '41 - 45 cm'
            ],
            [
                'ukuran_min' => 46,
                'ukuran_max' => 50,
                'biaya' => 500000,
                'keterangan' => '46 - 50 cm'
            ],
            [
                'ukuran_min' => 51,
                'ukuran_max' => 55,
                'biaya' => 600000,
                'keterangan' => '51 - 55 cm'
            ],
            [
                'ukuran_min' => 56,
                'ukuran_max' => 60,
                'biaya' => 700000,
                'keterangan' => '56 - 60 cm'
            ],
            [
                'ukuran_min' => 61,
                'ukuran_max' => 65,
                'biaya' => 800000,
                'keterangan' => '61 - 65 cm'
            ]
        ]);
    }
}
