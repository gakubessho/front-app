<?php

use Illuminate\Database\Seeder;

class BoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
        ];
        DB::table("board")->insert($param);
    }
}
