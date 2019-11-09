<?php

use Illuminate\Database\Seeder;

class AgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ages')->insert([
        [
            'id'=>1,
            'age'=>"10代以下",
            'sort'=>1
        ],
        [
            'id'=>2,
            'age'=>"20代",
            'sort'=>2
        ],
        [
            'id'=>3,
            'age'=>"30代",
            'sort'=>3
        ],
        [
            'id'=>4,
            'age'=>"40代",
            'sort'=>4
        ],
        [
            'id'=>5,
            'age'=>"50代",
            'sort'=>5
        ],
        [
            'id'=>6,
            'age'=>"60代以上",
            'sort'=>6
        ]
        ]);
    }
}
