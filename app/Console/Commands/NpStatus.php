<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Http\Controllers\Server\ApiNP;

class NpStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'npstatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates order statuses';

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
    public function handle(ApiNP $np)
    {
        try{
            echo "Start updates order statuses\n";

            $orders = Order::where('status_id', 3)->get();

            if(!$orders){
                throw new \Exception("Error get models");
            }

            if($orders->count() == 0){
                throw new \Exception("Not models");
            }

            foreach ($orders as $order)
            {
                if($order->np_id != ''){
                    echo "Status request ID: " . $order->np_id . "\n";
                    $request = $np->getStatus($order->np_id);
                }else{
                    echo "Empty ID: " . $order->np_id . "\n";
                    continue;
                }

                if($request)
                {
                    echo "Status received ID: " . $order->np_id . "\n";
                }else{
                    echo "Request error ID: " . $order->np_id . "\n";
                    continue;
                }

                $order->np_response = serialize($request['data']);
                $order->np_status = $request['data'][0]['StateName'];

                if($order->save()){
                    echo "Order save ID: " . $order->np_id . "\n";
                }else{
                    echo "Error save ID: " . $order->np_id . "\n";
                    continue;
                }
            }

            $message = "End updates order statuses\n";

        } catch (\Exception $e) {
            $message = 'Error: ' . $e->getMessage();
        } finally {
            echo $message;
        }



    }
}
