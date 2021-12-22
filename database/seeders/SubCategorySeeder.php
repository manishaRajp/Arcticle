<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '1',
       'sub_name' => 'Be happy',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '1',
       'sub_name' => 'Be came a learner',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '1',
       'sub_name' => 'Read good books',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '2',
       'sub_name' => 'Stay tunned with fashion',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '2',
       'sub_name' => 'be fashnable',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '2',
       'sub_name' => 'Fashan is Pashan',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '3',
       'sub_name' => 'Eat and enjoy',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '3',
       'sub_name' => 'Khana hi Khajana hai',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '3',
       'sub_name' => 'Be foodyy',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '4',
       'sub_name' => 'Do New ',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '4',
       'sub_name' => 'Have fun',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '4',
       'sub_name' => 'Enjoy Life',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '5',
       'sub_name' => 'Art is happiness',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '5',
       'sub_name' => 'happiness come from art',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '5',
       'sub_name' => 'create happiness',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '6',
       'sub_name' => 'Study',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '6',
       'sub_name' => 'Spot',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '6',
       'sub_name' => 'Journy',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '7',
       'sub_name' => 'be focused',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '7',
       'sub_name' => 'be creative',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '7',
       'sub_name' => 'be understandind',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '8',
       'sub_name' => 'yummy fruite ',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '8',
       'sub_name' => 'yummy food ',
       ]);
       DB::table('article_sub_categories')->insert([
       'maincat_id' => '8',
       'sub_name' => 'yummy food good helth',
       ]);
      
    }
}
