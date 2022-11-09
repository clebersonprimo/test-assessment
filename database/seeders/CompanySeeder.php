<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert(['name' => 'Empresa A', 'description' => 'Descrição Empresa A', 'city' => 'Curitiba', 'state' => 'PR']);
        DB::table('companies')->insert(['name' => 'Empresa B', 'description' => 'Descrição Empresa B', 'city' => 'São Paulo', 'state' => 'SP']);
        DB::table('companies')->insert(['name' => 'Empresa C', 'description' => 'Descrição Empresa C', 'city' => 'Rio de Janeiro', 'state' => 'RJ']);
        DB::table('companies')->insert(['name' => 'Empresa D', 'description' => 'Descrição Empresa D', 'city' => 'Porto Alegre', 'state' => 'RS']);
        DB::table('companies')->insert(['name' => 'Empresa E', 'description' => 'Descrição Empresa E', 'city' => 'Belo Horizonte', 'state' => 'MG']);
        DB::table('companies')->insert(['name' => 'Empresa F', 'description' => 'Descrição Empresa F', 'city' => 'Florianópolis', 'state' => 'SC']);
        DB::table('companies')->insert(['name' => 'Empresa G', 'description' => 'Descrição Empresa G', 'city' => 'Maringá', 'state' => 'PR']);
        DB::table('companies')->insert(['name' => 'Empresa H', 'description' => 'Descrição Empresa H', 'city' => 'Lontrina', 'state' => 'PR']);
    }
}
