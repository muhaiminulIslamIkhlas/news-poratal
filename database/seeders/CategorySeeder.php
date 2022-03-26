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
        $catArray = ['প্রচ্ছদ','রাজনীিত','জাতীয়','খেলা','আন্তর্জাতিক','বিনোদন','স্বাস্থ্য','ফিচার'];

        foreach($catArray as $key=>$item){
            Category::create([
                'name' => $item,
                'order' => $key+1
            ]);
        }

    }
}
