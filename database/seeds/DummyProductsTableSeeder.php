<?php

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class DummyProductsTableSeeder extends Seeder
{
    public function run()
    {

        $brands = \App\Models\Brand::lists('id');
        $characteristics = \App\Models\FilterValue::get(['id']);

	    $faker = Factory::create();

	    for($i = 0; $i < 1000000; $i++){
		    $product = Product::create([
			    'category_id' => \App\Models\Category::get(['id'])->random()->id,
			    'active' => 1,
				'rating' => $faker->numberBetween(0,5),
			    'article' => $faker->numberBetween(1000,9999),
				'price' => round(rand(1000, 50000) / 1000) * 1000,
				'title' => $faker->sentence(),
				'slug' => $faker->sentence(),
			    'excerpt' => $faker->sentence(10),
				'body' => $faker->sentence(100),
			    'meta_title' => $faker->sentence(),
			    'meta_description' => $faker->sentence(),
			    'meta_keywords' => $faker->sentence(),
			    'pack' => $faker->sentence(),
			    'video' => $faker->sentence(),
			    'available' => 1,
			    'brand_id' => 1,
			    'flash_view' => $faker->sentence(),
			    'is_bestseller' => $faker->boolean(2),
			    'is_new' => $faker->boolean(2),
		    ]);

	    }

    }
}
