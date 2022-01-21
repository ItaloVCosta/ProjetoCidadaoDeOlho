<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VerbaIndenizatoria;

class VerbaIndenizatoriaSeeder extends Seeder
{
    /**
     * Roda a seed do banco de dados
     *
     * @return void
     */
    public function run()
    {
        VerbaIndenizatoria::create([
            'deputado_ids' => 141,
            'mes' => 'Janeiro',
            'deputado_nomes' => 'John Doe',
            'reembolso_valores' =>  1561
        ]);
    }
    
}
