<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class CreateCategoriesTableSeeder extends Seeder
{
    public function run()
    {
	    DB::table('categories')->delete();
        $faker = Faker\Factory::create();
		$categories = [
			"жилая", "коммерческая", "квартиры", "апартаменты", "жилые комплексы",
			"пентхаусы", "дома", "street retail","ОС3", "офисы","торговая","БЦ"
		];
	    foreach($categories as $categoryName){
		    $category = new Category();
		    $category->title = $categoryName;
		    $category->slug = str_replace(" ", "-",$categoryName);
		    $category->show = true;
		    $category->save();
	    }
    }
}
