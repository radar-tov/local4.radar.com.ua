<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class YMLYandex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'umlyandex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generation YMLYandex.xml';

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
    public function fire()
    {
        $this->tovarMap();
    }

    public function tovarMap()
    {
        //Sitemap для товаров
        $data = FrontendController::sitemapCategories();
        $doctype = "yml_catalog SYSTEM \"shops.dtd\"";
        $domDocument = new \DOMDocument('1.0', "UTF-8", $doctype);


        $domDocument->formatOutput = true;


//        foreach($data as $cat){
//
//            $subData = FrontendController::sitemapSubCategories($cat->id);
//
//            if($subData){
//                foreach($subData as $subCat) {
//
//                    $products = FrontendController::sitemapProducts($subCat->id);
//
//                    if($products){
//                        foreach($products as $product) {
//
//
//                        }
//
//                    }
//
//                }
//
//            }
//
//        }

        $domDocument->save('storage/app/yml_products.xml');
    }

}