<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::disableForeignKeyConstraints();
        $groups = [
            'law_under_registered',
            'category_area_operations',
            'nature_authorization',
            'networks',
            'auth_document_type',
            'banks',
        ];
        $mapped_groups = array_map(function ($group) {
            return ['name' => $group];
        }, $groups);

        Type::insert($mapped_groups);
    }
}
