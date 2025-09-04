<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Alfredo';
        $fornecedor->site = 'alfredo.com';
        $fornecedor->uf = 'PE';
        $fornecedor->email = 'alfredo@gmail.com';

        $fornecedor->save();

        Fornecedor::created([
            'nome' => 'Carlos', 
            'site' => 'ablubl',
            'uf' => 'AP',
            'email' => 'carlos@email.com',
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'hay', 
            'site' => 'hay.com',
            'uf' => 'AP',
            'email' => 'hay@email.com',
        ]);
    }
}
