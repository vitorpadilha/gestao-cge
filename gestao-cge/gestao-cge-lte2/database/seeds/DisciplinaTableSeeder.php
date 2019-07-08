<?php

use Illuminate\Database\Seeder;
use App\Models\Disciplina;

class DisciplinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disciplina::create([
            'descricao'=>'Administração Pública',
            'id'=>1
        ]);
        Disciplina::create([
            'descricao'=>'Matemática',
            'id'=>2
        ]);
        Disciplina::create([
            'descricao'=>'Informática Básica',
            'id'=>3
        ]);
        Disciplina::create([
            'descricao'=>'Lógica de Programação',
            'id'=>4
        ]);
        Disciplina::create([
            'descricao'=>'História',
            'id'=>5
        ]);
        Disciplina::create([
            'descricao'=>'Física',
            'id'=>6
        ]);
        Disciplina::create([
            'descricao'=>'Geografia',
            'id'=>7
        ]);
    }
}
