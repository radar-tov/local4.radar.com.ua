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
            $excel->sheet('Газовые котлы', function($sheet) {
                $products = \App\Models\Product::where('category_id', 111)->get();
                $i=2;

                $sheet->cell('A1', function($cell) {
                    $cell->setFontWeight('bold');
                    $cell->setFontSize(15);
                    $cell->setBorder('solid', 'solid', 'solid', 'solid');
                    $cell->setAlignment('center');
                    $cell->setValue("Наименование");
                });
                $sheet->cell('B1', function($cell) {
                    $cell->setFontWeight('bold');
                    $cell->setFontSize(15   );
                    $cell->setBorder(array(
                        'top'   => array(
                            'style' => 'solid'
                        ),
                    ));
                    $cell->setAlignment('center');
                    $cell->setValue("Цена");
                });

                foreach ($products as $product){
                    if($product->name != ''){
                        $name = $product->name;
                    }else{
                        $name = $product->title;
                    }
                    $price = round($product->cena_montaj, 2).' гр.';

                    $sheet->row($i, array(
                        $name, $price
                    ));
                    $i++;
                }
            });
        })->store('xls', 'storage/app');

        echo "End recording a price.\n";
    }
}
