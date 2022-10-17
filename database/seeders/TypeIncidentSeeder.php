<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeIncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("type_incidents")->insert([
            ["nom"=>"informatique"],
            ["nom"=>"materiel"],
            ["nom"=>"naturel"],
            ["nom"=>"travail"],
        ]);
    }
}
