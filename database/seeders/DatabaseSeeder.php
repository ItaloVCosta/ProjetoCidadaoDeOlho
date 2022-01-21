<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Roda a seed de todas as seeders referenciadas
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RedeSocialSeeder::class,
            VerbaIndenizatoriaSeeder::class,
        ]);
    }
}
