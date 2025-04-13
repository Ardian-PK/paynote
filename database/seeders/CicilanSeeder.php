<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CicilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default cicilan Items
        $cicilan = [
            'Food',
            'Transportation',
            'Clothing',
            'Drink',
            'Medical',
        ];

        foreach ($cicilan as $dcicilan) {
            DB::table('cicilan')->insert([
                'name_cicilan' => $dcicilan,
                // 'ref_cicilan' =>'REF-' . strtoupper(Str::random(8))
            ]);
        }
    }
    
}
