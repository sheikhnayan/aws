<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\product_info;
use App\offer_setup;
use DB;
class pricereturn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:pricechange';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
   public function handle()
    {
        date_default_timezone_set('Asia/Dhaka');
        
            $datetime = DB::select('SELECT NOW() as dates');
          foreach ($datetime as $key => $value) 
          {
              
          $newdate=   $value->dates;
            
              
          }
          

          $flashsale = offer_setup::orderBy('id', 'DESC')
                      ->where('end_date_time','<',$newdate)
                      ->where('type','1')
                      ->where('status','1')
                      ->get();

        foreach ($flashsale as $value) 
        {

          $datas = $value->product_id;
          $data= product_info::where('id',$value->product_id)->first();
          $update = product_info::where('id',$value->product_id)
          ->update([
            'discount_price'=>'0',
            'discount_per'=>'0',
            'current_price'=>$data->sale_price,
          ]);

          $updates = offer_setup::where('product_id',$value->product_id)
          ->update([
            'status'=>'0',
          ]);
          
        }
          

          $dhamaka = offer_setup::orderBy('id', 'DESC')
                      ->where('end_date_time','<',$newdate)
                      ->where('type','5')
                      ->where('status','1')
                      ->get();

        foreach ($dhamaka as $value) 
        {

          $datas = $value->product_id;
          $data= product_info::where('id',$value->product_id)->first();
          $update = product_info::where('id',$value->product_id)
          ->update([
            'discount_price'=>'0',
            'discount_per'=>'0',
            'current_price'=>$data->sale_price,
          ]);

          $updates = offer_setup::where('product_id',$value->product_id)
          ->update([
            'status'=>'0',
          ]);
          
        }
    }
}
