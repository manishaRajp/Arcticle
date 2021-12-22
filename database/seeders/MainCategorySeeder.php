<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;
use Database\Factories\MainCategoryFactory;
class MainCategorySeeder extends Seeder
{
     
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $data = [
          ['name' => 'Happy Life'],
          ['name' => 'Fashion Tips'],
          ['name' => 'Food'],
          ['name' => 'Adventure'],
          ['name' => 'Art'],
          ['name' => 'Acedamic'],
          ['name' => 'Career'],
          ['name' => 'Yummy Bites']
          ];
          ArticleCategory::insert($data);
    }
}
