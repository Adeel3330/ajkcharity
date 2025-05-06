<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\DropdownItemService;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
class TypeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $items = array_merge( 
            DropdownItemService::provinces(),
            DropdownItemService::law_under_registered(),
            DropdownItemService::category_area_operations(),
            DropdownItemService::nature_authorization(),
            DropdownItemService::networks(),
            DropdownItemService::auth_document_type(),
            DropdownItemService::banks(),
        );

        try {
            $mapped_items = array_map(function ($type) {
                $typeId = Type::where('name', $type['type'])->pluck('id')->first();
    
                if (!$typeId) {
                    throw new \Exception("Type '{$type['type']}' not found.");
                }
    
                return [
                    'name' => $type['value'],
                    'parent_id' => $typeId
                ];
            }, $items);
    
            Type::insert($mapped_items);
            
        } catch (\Exception $exception) {
            $this->command->warn("Something went wrong, skipping...." . $exception->getMessage() . PHP_EOL);
        }
    }
}
