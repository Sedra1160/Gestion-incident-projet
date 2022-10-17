<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class AdministrateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("administrateurs")->insert([
            ["matricule"=>"1000","nom"=>"dadabe","prenom"=>"dadabe","photo"=>"","email"=>"dadabe@gmail.com","mdp"=>'1234'],
        ]);
    }
}
