<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert($this->getDataSource());
        DB::table('categories')->insert($this->getDataCat());
        DB::table('news')->insert($this->getData());

    }

    public function getDataSource()
    {
        $fakerSource = Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 5; $i++){
            $data[] = [
                'name' => $fakerSource->word(rand(3,10)),
            ];
        }
        return $data;
    }

    public function getDataCat()
    {
        $fakerCat = Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 5; $i++){
            $data[] = [
                'name' => $fakerCat->word(rand(3,10)),
            ];
        }
        return $data;
    }

    private function getData()
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i <10; $i++){
            $data[]=[
                'categoryId' => $faker->biasedNumberBetween(1,5),
                'resourceId' => $faker->biasedNumberBetween(1,5),
                'title' => $faker->word(rand(3,10)),
                'description' => $faker->realText(rand(100,200)),
            ];
        }
        return $data;
    }
}
