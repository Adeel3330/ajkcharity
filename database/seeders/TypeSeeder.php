<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        $type1 = Type::create([
            'name' => 'Type1',
            'description' => 'lorem ipsum lorem ipsum lorem ipsum',
            'fee' => 1000,
        ]);
        
        $type2 = Type::create([
            'name' => 'Company Admin',
            'name' => 'Type1',
            'description' => 'lorem ipsum lorem ipsum lorem ipsum',
            'fee' => 1000,
        ]);

        DB::commit();
    }
}
