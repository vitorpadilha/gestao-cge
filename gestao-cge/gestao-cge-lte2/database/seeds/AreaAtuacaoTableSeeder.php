<?php

use Illuminate\Database\Seeder;
use App\Models\AreaAtuacao;

class AreaAtuacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaAtuacao::create([
            'descricao'=>'Administração',
            'id'=>1
        ]);
        AreaAtuacao::create([
            'descricao'=>'Matemática',
            'id'=>2
        ]);
        AreaAtuacao::create([
            'descricao'=>'Informática Básica',
            'id'=>3
        ]);
        AreaAtuacao::create([
            'descricao'=>'Desenvolvimento de Sistemas',
            'id'=>4
        ]);
        AreaAtuacao::create([
            'descricao'=>'História',
            'id'=>5
        ]);
        AreaAtuacao::create([
            'descricao'=>'Física',
            'id'=>6
        ]);
    }
}
