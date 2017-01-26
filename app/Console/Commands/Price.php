<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Excel;
use App\Models\Product;

class Price extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create price.xls';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "Start recording a price.\n";

        Excel::create('price', function($excel) {

            $parent_cat = \App\Models\Category::where('show', 1)->where('parent_id', 0)->orderBy('order')->get();

            foreach ($parent_cat as $cat){

                $categories = \App\Models\Category::where('show', 1)->where('parent_id', $cat->id)->orderBy('order')->get();

                foreach ($categories as $category){
                    echo $category->id."\n";
                    $excel->sheet(substr($category->admin_title, 0, 30), function($sheet) use ($category){

                        $products = \App\Models\Product::where('category_id', $category->id)->where('active', 1)->orderBy('title')->get();

                        $sheet->loadView('admin.price.index', compact('products', 'category'));

                    });

                }

            }

        })->store('xls', 'public/xls');

        echo "End recording a price.\n";
    }
}
