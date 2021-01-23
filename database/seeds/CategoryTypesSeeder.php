<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_types')->insert([
            'title' => 'income',
            'is_postive' => '1',
        ]);

        DB::table('categories_types')->insert([
            'title' => 'expense',
            'is_postive' => '0',
        ]);
    }
}
