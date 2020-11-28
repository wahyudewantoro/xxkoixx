<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'  => 'Administrator',
            'kota'  => 'Kediri',
            'no_hp'  => '082330319913',
            'email' => 'admin@admin.com',
            'password'  => bcrypt('password')
        ]);
    }
}
