<?php

use Illuminate\Database\Seeder;
use App\Refjuara;

class RefJuaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
            ['id' => 1, 'nama' => 'Juara 1','id_up' =>null],
            ['id' => 2, 'nama' => 'Juara 2', 'id_up' => 1],
            ['id' => 3, 'nama' => 'Juara 3', 'id_up' => 2],
            ['id' => 4, 'nama' => 'Juara 4', 'id_up' => 3],
            ['id' => 5, 'nama' => 'Juara 5', 'id_up' => 4],
            ['id' => 6, 'nama' => 'Best In Size','id_up' =>null],
            ['id' => 7, 'nama' => 'Runner Up','id_up' =>null],
            ['id' => 8, 'nama' => 'Champion','id_up' =>null]
        );
        Refjuara::insert($data);
    }
}
