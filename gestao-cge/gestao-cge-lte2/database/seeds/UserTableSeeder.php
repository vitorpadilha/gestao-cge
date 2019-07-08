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
            'idGrupo'=>1,
            'password'=>bcrypt('123456'),
        ]);
        User::create([
            'name'=>'Eleana Sarmento',
            'email'=>'eleana.sarmento@ifam.edu.br',
            'idGrupo'=>2,
            'password'=>bcrypt('123456'),
        ]);
        User::create([
            'name'=>'Juliana',
            'email'=>'juliana@ifam.edu.br',
            'idGrupo'=>4,
            'password'=>bcrypt('123456'),
        ]);
    }
}
