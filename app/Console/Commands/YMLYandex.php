<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Frontend\FrontendController;

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
        $this->tovarMap(111);
    }

    public function tovarMap($id_subCat)
    {
        //Sitemap для товаров

        $host = 'http://radar.com.ua';
        $path_file = 'storage/app/yml_products_'.$id_subCat.'.xml';

        $line = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<!DOCTYPE yml_catalog SYSTEM \"shops.dtd\">\n";
        \File::put($path_file, $line);

        $date = new \DateTime('NOW');
        $line = "<yml_catalog date=\"".$date->format("Y-m-d H:m")."\">\n";
        \File::append($path_file, $line);

            $line = "\t<shop>\n";
            \File::append($path_file, $line);

                $line = "\t\t<name>RADAR</name>\n";
                \File::append($path_file, $line);

                $line = "\t\t<company>RADAR</company>\n";
                \File::append($path_file, $line);

                $line = "\t\t<url>$host</url>\n";
                \File::append($path_file, $line);

                $line = "\t\t<currencies>\n";
                \File::append($path_file, $line);

                    $line = "\t\t\t<currency id=\"UAH\" rate=\"NBU\"/>\n";
                    \File::append($path_file, $line);

                    $line = "\t\t\t<categories>\n";
                    \File::append($path_file, $line);

                    $dataCategories = FrontendController::sitemapCategories();
                    if($dataCategories) {
                        foreach($dataCategories as $cat){
                            $line = "\t\t\t\t<category id=\"".$cat->id."\">".$cat->title."</category>\n";
                            \File::append($path_file, $line);

                            $subCategory = FrontendController::sitemapSubCategories($cat->id);
                            if($subCategory){
                                foreach($subCategory as $subCat){
                                    $line = "\t\t\t\t<category id=\"".$subCat->id."\" parentId=\"".$subCat->parent_id."\">".$subCat->title."</category>\n";
                                    \File::append($path_file, $line);
                                }
                            }
                        }
                    }

                    $line = "\t\t\t</categories>\n";
                    \File::append($path_file, $line);

                    $line = "\t\t\t<delivery-options>100</delivery-options>\n";
                    \File::append($path_file, $line);

                    $line = "\t\t\t<offers>\n";
                    \File::append($path_file, $line);

                        if($dataCategories){
                            foreach($dataCategories as $cat){
                                $subCategory = FrontendController::sitemapSubCategories($cat->id);
                                if($subCategory){
                                    foreach($subCategory as $subCat){
                                        $products = FrontendController::sitemapProducts($subCat->id);
                                        if($products && $subCat->id == $id_subCat) {
                                            foreach($products as $product){
                                                if(!$product->available == 0){

                                                    ($product->available == 1) ? $available = 'true' : $available = 'false';
                                                    $line = "\t\t\t\t<offer id=\"".$product->id."\" type=\"vendor.model\" available=\"".$available."\">\n";
                                                    \File::append($path_file, $line);

                                                        //Адрес страницы
                                                        $line = "\t\t\t\t\t<url>".$host.'/'.$cat->slug.'/'.$subCat->slug.'/'.$product->slug."</url>\n";
                                                        \File::append($path_file, $line);

                                                        //Цена
                                                        $line = "\t\t\t\t\t<price>".$product->price."</price>\n";
                                                        \File::append($path_file, $line);

                                                        //Валюта
                                                        $line = "\t\t\t\t\t<currencyId>UAH</currencyId>\n";
                                                        \File::append($path_file, $line);

                                                        // ID Категории
                                                        $line = "\t\t\t\t\t<categoryId>".$subCat->id."</categoryId>\n";
                                                        \File::append($path_file, $line);

                                                        //Картинка
                                                        $line = "\t\t\t\t\t<picture>".$host.$product->thumbnail->first()->path."</picture>\n";
                                                        \File::append($path_file, $line);

                                                        //Возможность доставки
                                                        $line = "\t\t\t\t\t<delivery>true</delivery>\n";
                                                        \File::append($path_file, $line);

                                                        //Название категории товаров
                                                        $line = "\t\t\t\t\t<typePrefix>".$subCat->title."</typePrefix>\n";
                                                        \File::append($path_file, $line);

                                                        foreach($product->sortedValues($product->category_id) as $field){
                                                            if($field->filter->title == "Производитель"){

                                                                $ar = explode(",", $field->value);
                                                                //Производитель
                                                                $line = "\t\t\t\t\t<vendor>".str_replace(" ", "", $ar[0])."</vendor>\n";
                                                                \File::append($path_file, $line);
                                                            }
                                                        }

                                                        if($product->article){
                                                            //Артикул производителя
                                                            $line = "\t\t\t\t\t<vendorCode>".$product->article."</vendorCode>\n";
                                                            \File::append($path_file, $line);
                                                        }

                                                        //Модель
                                                        $line = "\t\t\t\t\t<model>".$product->title."</model>\n";
                                                        \File::append($path_file, $line);

                                                        if($product->meta_description){
                                                            //Описание
                                                            $line = "\t\t\t\t\t<description>".$product->meta_description."</description>\n";
                                                            \File::append($path_file, $line);
                                                        }

                                                        //Страна производитель
                                                        $line = "\t\t\t\t\t<country_of_origin>".$ar[1]."</country_of_origin>\n";
                                                        \File::append($path_file, $line);

                                                    $line = "\t\t\t\t</offer>\n";
                                                    \File::append($path_file, $line);

                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    $line = "\t\t\t</offers>\n";
                    \File::append($path_file, $line);

                $line = "\t\t</currencies>\n";
                \File::append($path_file, $line);

            $line = "\t</shop>\n";
            \File::append($path_file, $line);

        $line = "</yml_catalog>\n";
        \File::append($path_file, $line);
    }

}