<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EndorserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Endorser::factory(9)->create();
    }
}
