<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Vitor Padilha Gonçalves',
            'email'=>'vitor.padilha@ifam.edu.br',
            'password'=>bcrypt('123456'),
        ]);
    }
}
