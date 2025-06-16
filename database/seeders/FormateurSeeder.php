<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\formateur;

class FormateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formateurs = [
            [
                'identification' => 46,
                'last_name' => 'TAOURIRT',
                'name' => 'RACHIDA',
            ],
            [
                'identification' => 86,
                'last_name' => 'MASTOUR',
                'name' => 'ASMAE',
            ],
            [
                'identification' => 133,
                'last_name' => 'BELHOUSSAIEN',
                'name' => 'ZOHRA',
            ],
            [
                'identification' => 242,
                'last_name' => 'LAKRIM',
                'name' => 'RACHIDA',
            ],
            [
                'identification' => 267,
                'last_name' => 'BETATNI',
                'name' => 'SOUAD',
            ],
            [
                'identification' => 514,
                'last_name' => 'ED DOKKALI',
                'name' => 'MUSTAPHA',
            ],
            [
                'identification' => 602,
                'last_name' => 'ABOUZID',
                'name' => 'KHADIJA',
            ],
            [
                'identification' => 723,
                'last_name' => 'ERIFAI',
                'name' => 'ABDELLATIF',
            ],
            [
                'identification' => 936,
                'last_name' => 'ES-SEBSABE',
                'name' => 'ABDELRHANI',
            ],
        ];

        foreach ($formateurs as $formateurData) {
            formateur::create($formateurData);
        }
    }
}
