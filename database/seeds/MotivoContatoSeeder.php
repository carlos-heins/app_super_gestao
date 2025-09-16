<?php

use App\MotivoContato;
use Illuminate\Database\Seeder;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivoContato = new MotivoContato();
        $motivoContato->motivo_contato = 'Dúvida';
        $motivoContato->save();

        $motivoContato = new MotivoContato();
        $motivoContato->motivo_contato = 'Elogio';
        $motivoContato->save();

        $motivoContato = new MotivoContato();
        $motivoContato->motivo_contato = 'Reclamação';
        $motivoContato->save();
    }
}
