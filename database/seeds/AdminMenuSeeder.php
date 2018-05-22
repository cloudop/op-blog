<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu')->insert([
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Log viewer',
                'icon' => 'fa-database',
                'uri' => 'logs'
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Post',
                'icon' => 'fa-th-list',
                'uri' => 'post'
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Category',
                'icon' => 'fa-dedent',
                'uri' => 'category'
            ],
        ]);
    }
}
