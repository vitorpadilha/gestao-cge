<?php

use App\Models\GrupoUsuario;
use Illuminate\Database\Seeder;

class GrupoUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrupoUsuario::create([
            'descricao'=>'Administrador',
            'id'=>1
        ]);
        GrupoUsuario::create([
            'descricao'=>'Coordenador de Turnos',
            'id'=>2
        ]);
        GrupoUsuario::create([
            'descricao'=>'Professor',
            'id'=>3
        ]);
        GrupoUsuario::create([
            'descricao'=>'Assistente de Alunos',
            'id'=>4
        ]);
        GrupoUsuario::create([
            'descricao'=>'Coordenador de Curso',
            'id'=>5
        ]);
        GrupoUsuario::create([
            'descricao'=>'Diretor de Ensino',
            'id'=>6
        ]);
    }
}
