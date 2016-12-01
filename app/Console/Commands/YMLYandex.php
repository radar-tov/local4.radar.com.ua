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
        $host = 'http://radar.com.ua';
        $path_file = 'storage/app/yml_products.xml';

        $date = new \DateTime('NOW');
        $date = $date->format("Y-m-d H:m");

        $in = 41055;
        $to = 41105;

        echo "Запись файла началась. $date\n";

        if(!$this->headerYML($host, $path_file, $date)){
            echo "Ошибка записи шапки.\n";
            exit();
        }

        $i = 1; $id = 0;
        while($id < 41777){
            if($i > 1){
                $in = $id + 1;
                $to = $in + 50;
            }
            echo "$i. от $in до $to \n";
            $id = $this->tovarYML($host, $path_file, $in, $to);
            $i++;
        }

        if($this->footerYML($path_file)){
            echo "Запись завершена.\n";
            exit();
        }else{
            echo "Ошибка записи подвала.\n";
            exit();
        };

    }

    //Будет исать шапку файла
    public function headerYML($host, $path_file, $date){

        $line = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<!DOCTYPE yml_catalog SYSTEM \"shops.dtd\">\n";
        \File::put($path_file, $line);

        $line = "<yml_catalog date=\"".$date."\">\n";
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

                    $line = "\t\t\t<currency id=\"UAH\" rate=\"1\"/>\n";
                    \File::append($path_file, $line);

                    $line = "\t\t\t<currency id=\"USD\" rate=\"NBU\"/>\n";
                    \File::append($path_file, $line);

                    $line = "\t\t\t<currency id=\"EUR\" rate=\"NBU\"/>\n";
                    \File::append($path_file, $line);

                $line = "\t\t</currencies>\n";
                \File::append($path_file, $line);

                $line = "\t\t<categories>\n";
                \File::append($path_file, $line);

                    $dataCategories = FrontendController::sitemapCategories();
                    if($dataCategories) {
                        foreach($dataCategories as $cat){

                            if($cat->yndex){

                                $line = "\t\t\t<category id=\"".$cat->id."\">".$cat->title."</category>\n";
                                \File::append($path_file, $line);

                                $subCategory = FrontendController::sitemapSubCategories($cat->id);

                                if($subCategory){
                                    foreach($subCategory as $subCat){

                                        if($subCat->yandex) {

                                            $line = "\t\t\t<category id=\"" . $subCat->id . "\" parentId=\"" . $subCat->parent_id . "\">" . $subCat->title . "</category>\n";
                                            \File::append($path_file, $line);

                                        }
                                    }
                                }else{
                                    return false;
                                }


                            }


                        }
                    }else{
                        return false;
                    }

                $line = "\t\t</categories>\n";
                \File::append($path_file, $line);

                $line = "\t\t<delivery-options>100</delivery-options>\n";
                \File::append($path_file, $line);

                $line = "\t\t<offers>\n";
                \File::append($path_file, $line);

        unset($dataCategories);
        unset($subCategory);

        echo "Шапка записана\n";
        return true;
    }

    //Будет исать подвал файла
    public function footerYML($path_file){


        $line = "\t\t</offers>\n";

        \File::append($path_file, $line);

        $line = "\t</shop>\n";
        \File::append($path_file, $line);

        $line = "</yml_catalog>\n";
        \File::append($path_file, $line);

        echo "Подвал записан.\n";
        return true;
    }

    //Будет писать товары в тело файла
    public function tovarYML($host, $path_file, $in, $to)
    {
        $i=1;
        //echo "Запись товаров начата.\n";

        $dataCategories = FrontendController::sitemapCategories();

        if($dataCategories){

            foreach($dataCategories as $cat){
                //if($cat->id)echo "Получены категории.\n";

                $subCategory = FrontendController::sitemapSubCategories($cat->id);

                if($subCategory){

                    foreach($subCategory as $subCat){
                        //if($subCat->id)echo "Получены подкатегории.\n";

                        $products = FrontendController::getProductsYML($subCat->id, $in, $to);

                        if($products) {

                            foreach($products as $product){

                                //if($product->id)echo "$i. - $product->id\n";
                                //$i++;

                                if($product->yandex){

                                    ($product->available == 1) ? $available = 'true' : $available = 'false';
                                    $line = "\t\t\t<offer id=\"".$product->id."\" type=\"vendor.model\" available=\"".$available."\">\n";
                                    \File::append($path_file, $line);

                                        //Адрес страницы

                                        if(isset($product->slug)){
                                            $line = "\t\t\t\t<url>".$host.'/'.$cat->slug.'/'.$subCat->slug.'/'.$product->slug."</url>\n";
                                            \File::append($path_file, $line);
                                        }
                                        if(isset($product->price)) {
                                            //Цена
                                            $line = "\t\t\t\t<price>" . $product->price . "</price>\n";
                                            \File::append($path_file, $line);
                                        }

                                        //Валюта
                                        $line = "\t\t\t\t<currencyId>UAH</currencyId>\n";
                                        \File::append($path_file, $line);

                                        // ID Категории
                                        $line = "\t\t\t\t<categoryId>".$subCat->id."</categoryId>\n";
                                        \File::append($path_file, $line);

                                        if(isset($product->thumbnail)){
                                            //Картинка
                                            $line = "\t\t\t\t<picture>".$host.$product->thumbnail->first()->path."</picture>\n";
                                            \File::append($path_file, $line);
                                        }
                                    
                                        //Возможность доставки
                                        $line = "\t\t\t\t<delivery>true</delivery>\n";
                                        \File::append($path_file, $line);

                                        //Название категории товаров
                                        if(isset($subCat->title)) {
                                            $line = "\t\t\t\t<typePrefix>".$subCat->title."</typePrefix>\n";
                                            \File::append($path_file, $line);
                                        }

                                        foreach($product->sortedValues($product->category_id) as $field){
                                            if($field->filter->title == "Производитель"){

                                                $ar = explode(",", $field->value);
                                                //Производитель
                                                $line = "\t\t\t\t<vendor>".str_replace(" ", "", $ar[0])."</vendor>\n";
                                                \File::append($path_file, $line);
                                            }
                                        }

                                        if($product->article != '-'){
                                            //Артикул производителя
                                            $line = "\t\t\t\t<vendorCode>".$product->article."</vendorCode>\n";
                                            \File::append($path_file, $line);
                                        }

                                        //Модель
                                        $line = "\t\t\t\t<model>".htmlspecialchars($product->title)."</model>\n";
                                        \File::append($path_file, $line);

                                        if(isset($product->meta_description) && $product->meta_description != ''){
                                            //Описание
                                            $line = "\t\t\t\t<description>".htmlspecialchars($product->meta_description)."</description>\n";
                                            \File::append($path_file, $line);
                                        }

                                        //Страна производитель
                                        $line = "\t\t\t\t<country_of_origin>".str_replace(" ", "", $ar[1])."</country_of_origin>\n";
                                        \File::append($path_file, $line);

                                    $line = "\t\t\t</offer>\n";
                                    \File::append($path_file, $line);

                                }
                            }
                        }else{
                            echo "Не получен массив товаров.\n";
                        }
                    }
                }else{
                    echo "Не получен массив подкатегорий.\n";
                    return false;
                }
            }
        }else{
            echo "Не получен массив категорий.\n";
            return false;
        }

        unset($product);
        unset($products);
        unset($subCategory);
        unset($dataCategories);

        return $to;

    }

}