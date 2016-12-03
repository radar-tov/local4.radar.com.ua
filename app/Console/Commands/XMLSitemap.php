<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InformationController;

class XMLSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xmlsitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generation Sitemap.xml';

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
        $date = new \DateTime('NOW');
        $date = $date->format("Y-m-d H:m");
        $this->sitemapStaticPages();
        $this->sitemapStati();
        $this->sitemapCategories();
        if($this->sitemapProductsXml()){
            echo "Записано - $date";
        }else {
            echo "Ошибка - $date";
        }

    }


    public function sitemapStaticPages()
    {

        //Sitemap для статических страниц
        $data = FrontendController::sitemapPages();

        $domDocument = new \DOMDocument('1.0', "UTF-8");
        $domDocument->formatOutput = true;
        $domElement = $domDocument->createElement('urlset');
        $domAttribute = $domDocument->createAttribute('xmlns');
        $domAttribute->value = 'http://www.sitemaps.org/schemas/sitemap/0.9';
        $domElement->appendChild($domAttribute);
        $domDocument->appendChild($domElement);

        //Для главной страницы
        $domElementUrl = $domElement->appendChild($domDocument->createElement('url'));
        $url = $domElementUrl->appendChild($domDocument->createElement('loc'));
        $url->appendChild($domDocument->createTextNode('http://radar.com.ua/'));

        foreach($data as $product){

            if($product->sitemap){

                $domElementUrl = $domElement->appendChild($domDocument->createElement('url'));

                $url = $domElementUrl->appendChild($domDocument->createElement('loc'));
                $url->appendChild($domDocument->createTextNode('http://radar.com.ua/'.($product->slug)));

                $url = $domElementUrl->appendChild($domDocument->createElement('lastmod'));
                $date = new \DateTime($product->updated_at);
                $url->appendChild($domDocument->createTextNode($date->format("Y-m-d")));

                $url = $domElementUrl->appendChild($domDocument->createElement('changefreq'));
                $url->appendChild($domDocument->createTextNode($product->changefreq));

                $url = $domElementUrl->appendChild($domDocument->createElement('priority'));
                $url->appendChild($domDocument->createTextNode($product->priority));

            }

        }

        $domDocument->save('storage/app/sitemap_page.xml');

    }


    public function sitemapStati()
    {

        //Sitemap для статей
        $data = InformationController::sitemapStati();

        $domDocument = new \DOMDocument('1.0', "UTF-8");
        $domDocument->formatOutput = true;
        $domElement = $domDocument->createElement('urlset');
        $domAttribute = $domDocument->createAttribute('xmlns');
        $domAttribute->value = 'http://www.sitemaps.org/schemas/sitemap/0.9';
        $domElement->appendChild($domAttribute);
        $domDocument->appendChild($domElement);

        //для списка статей
        $domElementUrl = $domElement->appendChild($domDocument->createElement('url'));
        $url = $domElementUrl->appendChild($domDocument->createElement('loc'));
        $url->appendChild($domDocument->createTextNode('http://radar.com.ua/stati'));

        foreach($data as $product){

            if($product->sitemap) {

                $domElementUrl = $domElement->appendChild($domDocument->createElement('url'));

                $url = $domElementUrl->appendChild($domDocument->createElement('loc'));
                $url->appendChild($domDocument->createTextNode('http://radar.com.ua/stati/'.$product->slug));

                $url = $domElementUrl->appendChild($domDocument->createElement('lastmod'));
                $date = new \DateTime($product->updated_at);
                $url->appendChild($domDocument->createTextNode($date->format("Y-m-d")));

                $url = $domElementUrl->appendChild($domDocument->createElement('changefreq'));
                $url->appendChild($domDocument->createTextNode($product->changefreq));

                $url = $domElementUrl->appendChild($domDocument->createElement('priority'));
                $url->appendChild($domDocument->createTextNode($product->priority));
            }
        }

        $domDocument->save('storage/app/sitemap_stati.xml');

    }


    public function sitemapCategories()
    {

        //Sitemap для категорий
        $data = FrontendController::sitemapCategories();

        $domDocument = new \DOMDocument('1.0', "UTF-8");
        $domDocument->formatOutput = true;
        $domElement = $domDocument->createElement('urlset');
        $domAttribute = $domDocument->createAttribute('xmlns');
        $domAttribute->value = 'http://www.sitemaps.org/schemas/sitemap/0.9';
        $domElement->appendChild($domAttribute);
        $domDocument->appendChild($domElement);

        foreach($data as $product){

            if($product->sitemap) {

                $domElementUrl = $domElement->appendChild($domDocument->createElement('url'));

                $url = $domElementUrl->appendChild($domDocument->createElement('loc'));
                $url->appendChild($domDocument->createTextNode('http://radar.com.ua/' . $product->slug));

                $url = $domElementUrl->appendChild($domDocument->createElement('lastmod'));
                $date = new \DateTime($product->updated_at);
                $url->appendChild($domDocument->createTextNode($date->format("Y-m-d")));

                $url = $domElementUrl->appendChild($domDocument->createElement('changefreq'));
                $url->appendChild($domDocument->createTextNode($product->changefreq));

                $url = $domElementUrl->appendChild($domDocument->createElement('priority'));
                $url->appendChild($domDocument->createTextNode($product->priority));

                $subData = FrontendController::sitemapSubCategories($product->id);

                if ($subData) {
                    foreach ($subData as $subProduct) {

                        if($subProduct->sitemap) {

                            $domElementUrl = $domElement->appendChild($domDocument->createElement('url'));

                            $url = $domElementUrl->appendChild($domDocument->createElement('loc'));
                            $url->appendChild($domDocument->createTextNode('http://radar.com.ua/' . $product->slug . '/' . $subProduct->slug));

                            $url = $domElementUrl->appendChild($domDocument->createElement('lastmod'));
                            $subDate = new \DateTime($subProduct->updated_at);
                            $url->appendChild($domDocument->createTextNode($subDate->format("Y-m-d")));

                            $url = $domElementUrl->appendChild($domDocument->createElement('changefreq'));
                            $url->appendChild($domDocument->createTextNode($subProduct->changefreq));

                            $url = $domElementUrl->appendChild($domDocument->createElement('priority'));
                            $url->appendChild($domDocument->createTextNode($subProduct->priority));
                        }

                    }

                }
            }

        }

        $domDocument->save('storage/app/sitemap_categories.xml');

    }


    public function sitemapProductsXml()
    {

        //Sitemap для товаров
        $data = FrontendController::sitemapCategories();

        $domDocument = new \DOMDocument('1.0', "UTF-8");
        $domDocument->formatOutput = true;
        $domElement = $domDocument->createElement('urlset');
        $domAttribute = $domDocument->createAttribute('xmlns');
        $domAttribute->value = 'http://www.sitemaps.org/schemas/sitemap/0.9';
        $domElement->appendChild($domAttribute);
        $domDocument->appendChild($domElement);

        foreach($data as $cat){

            $subData = FrontendController::sitemapSubCategories($cat->id);

            if($subData){
                foreach($subData as $subCat) {

                    $products = FrontendController::sitemapProducts($subCat->id);

                    if($products){
                        foreach($products as $product) {

                            if($product->sitemap) {

                                $domElementUrl = $domElement->appendChild($domDocument->createElement('url'));

                                $url = $domElementUrl->appendChild($domDocument->createElement('loc'));
                                $url->appendChild($domDocument->createTextNode('http://radar.com.ua/' . $cat->slug . '/' . $subCat->slug . '/' . $product->slug));

                                $url = $domElementUrl->appendChild($domDocument->createElement('lastmod'));
                                $date = new \DateTime($product->updated_at);
                                $url->appendChild($domDocument->createTextNode($date->format("Y-m-d")));

                                $url = $domElementUrl->appendChild($domDocument->createElement('changefreq'));
                                $url->appendChild($domDocument->createTextNode($product->changefreq));

                                $url = $domElementUrl->appendChild($domDocument->createElement('priority'));
                                $url->appendChild($domDocument->createTextNode($product->priority));
                            }

                        }

                    }

                }

            }

        }

        $domDocument->save('storage/app/sitemap_products.xml');
        return true;
    }
}
