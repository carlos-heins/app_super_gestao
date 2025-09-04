<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(96) 99924-5465';
        // $contato->email = 'carlos@email.com';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem vindo!';
        // $contato->save();

        factory(SiteContato::class, 100)->create();
    }
}
