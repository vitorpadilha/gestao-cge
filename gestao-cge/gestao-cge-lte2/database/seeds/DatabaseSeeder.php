<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DisciplinaTableSeeder::class);
        $this->call(AreaAtuacaoTableSeeder::class);
        $this->call(GrupoUsuarioTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
