<?php

use Illuminate\Database\Seeder;
use App\JenisIkan;

class VarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        JenisIkan::insert(
            [
                ['nama' => 'Kohaku', 'kelas' => 'A', 'kelas_alias' => 'A', 'sort' => 1],
                ['nama' => 'Taisho Sanshoku', 'kelas' => 'A', 'kelas_alias' => 'A', 'sort' => 2],
                ['nama' => 'Showa Sanshoku', 'kelas' => 'A', 'kelas_alias' => 'A', 'sort' => 3],
                ['nama' => 'Shiro Utsuri', 'kelas' => 'B', 'kelas_alias' => 'B', 'sort' => 4],
                ['nama' => 'Koromo', 'kelas' => 'B', 'kelas_alias' => 'B', 'sort' => 5],
                ['nama' => 'Ochiba', 'kelas' => 'B', 'kelas_alias' => 'B', 'sort' => 6],
                ['nama' => 'Kinginrin A', 'kelas' => 'B', 'kelas_alias' => 'B', 'sort' => 7],
                ['nama' => 'Kujaku', 'kelas' => 'B', 'kelas_alias' => 'B', 'sort' => 8],
                ['nama' => 'Hikarimoyomono', 'kelas' => 'C', 'kelas_alias' => 'C', 'sort' => 9],
                ['nama' => 'Tancho', 'kelas' => 'C', 'kelas_alias' => 'C', 'sort' => 10],
                ['nama' => 'Kawarimono A', 'kelas' => 'C', 'kelas_alias' => 'C', 'sort' => 11],
                ['nama' => 'Doitsu', 'kelas' => 'C', 'kelas_alias' => 'C', 'sort' => 12],
                ['nama' => 'Kinginrin B', 'kelas' => 'C', 'kelas_alias' => 'C', 'sort' => 13],
                ['nama' => 'Ghosiki', 'kelas' => 'C', 'kelas_alias' => 'C', 'sort' => 14],
                ['nama' => 'Hikarimujimono', 'kelas' => 'D', 'kelas_alias' => 'D', 'sort' => 15],
                ['nama' => 'Asagi', 'kelas' => 'D', 'kelas_alias' => 'D', 'sort' => 16],
                ['nama' => 'Shusui', 'kelas' => 'D', 'kelas_alias' => 'D', 'sort' => 17],
                ['nama' => 'Bekko', 'kelas' => 'D', 'kelas_alias' => 'D', 'sort' => 18],
                ['nama' => 'Hi/Ki Utsurimono', 'kelas' => 'D', 'kelas_alias' => 'D', 'sort' => 19],
                ['nama' => 'Kawarimono B', 'kelas' => 'D', 'kelas_alias' => 'D', 'sort' => 20],
                ['nama' => 'Kinginrin C', 'kelas' => 'D', 'kelas_alias' => 'D', 'sort' => 21]
            ]
        );
    }
}
