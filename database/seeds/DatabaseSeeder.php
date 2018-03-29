<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*for($i=0; $i<100; $i++) {
            DB::table('products')->insert([
                'name' => 'Элик'.str_random(5),
                'alias' => str_random(10),
                'small_description' => str_random(10),
                'description' => str_random(10),
                'price' => 5,
                'image_menu' => str_random(10),
                'image_item' => str_random(10),
                'category_id' => 1
            ]);
        }*/
    }
}
