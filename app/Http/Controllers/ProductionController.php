<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use App\Models\Log;

class ProductionController extends Controller
{
    public function add_production()
    {
        $user_type = Session::get('session_user_type');
        // if ($user_type == 'admin') {
        if ($user_type) {
            $product_category = DB::table('product_category')->get();
            $product= DB::table('product')->get();
            //$item = DB::table('item')->where('item_status', 1)->where('item_stock', '>', 0)->get();

            return view('add_production', compact('product_category','product'));
        } else {
            return redirect(url('add_production'))->with("error", "Only Admin's can do Sales");
        }
    }

    public function add_production_post(Request $request)
    {
        echo "<pre>";
        // print_r($request->all());
        // exit();
        // dd($request->all());

        $request->validate([
            'product_id' => 'required|array',
            'product_category' => 'required',
            'product_qty' => 'required|array'
        ]);

        // try {
            $user_type = Session::get('session_name');

            // $ProductQty = $request->product_qty; 
            $ProductId = $request->product_id; 
            $ProductQty = $request->product_qty; 

            $length = min(count($ProductId), count($ProductQty));
            $result=[];
            $Pid=[];
            for ($i = 0; $i < $length; $i++) {

                $product = DB::table('product')
                ->where('id', '=',$ProductId[$i])
                ->first();
                $ItemQty = json_decode($product->item_qty, true);
                $ItemId = json_decode($product->item_id, true);
                $length1=count($ItemId);
                    $temp = [];
                    $temp1 = [];
                    foreach ($ItemQty as $Iqty)
                    {
                        $temp[]=$ProductQty[$i] * $Iqty;
                    }
                    $result[]= $temp;
                    for ($j = 0; $j < $length1; $j++)
                    {
                        $item = DB::table('item')
                        ->where('id', '=',$ItemId[$j])
                        ->first();
                        $temp1[]=$item->item_name;

                    }
                    
                    $Pid[]=$temp1;

            }
            echo "<br>";
                    print_r($Pid);
                    print_r($result);

                exit();

                            

            return redirect(url('add_production'))->with("success", "Product added successfully");

        

            // return redirect(url('add_product'))->with("error", "Product adding Failed, try again");


    }
   
}