<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RedeSocial;

class RedeSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RedeSocial::create([
            'rede_nomes' => 'John Doe',
            'quantidade_usuarios' => 5
        ]);
    }
}
