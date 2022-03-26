<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catArray = ['প্রচ্ছদ','লাইফস্টাইল', 'চাকরি', 'বিনোদন'];

        foreach($catArray as $item){
            Category::create([
                'name' => $item
            ]);
        }

    }
}
