<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keyArray = ['total_affected_bd','total_recover_bd','total_death_bd','total_affected_int','total_recover_int','total_death_int'];
        foreach($keyArray as $item){
            Information::create([
                'info_key'=>$item,
                'info_value'=>'0'
            ]);
        }


    }
}
