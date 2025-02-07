<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use App\Models\Log;
use Barryvdh\DomPDF\Facade\Pdf;

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

    // public function add_production_post(Request $request)
    // {
    //     echo "<pre>";
    //     $request->validate([
    //         'product_category' => 'required',
    //         'product_id' => 'required|array',
    //         'product_qty' => 'required|array'
    //     ]);

    //     $ProductId = $request->product_id; 
    //     $ProductQty = $request->product_qty; 
    //     $temp=[];
    //     foreach($ProductId as $Pid)
    //     {
    //     $product = DB::table('product')
    //         ->where('id', '=',$Pid)
    //         ->first();
    //         $ItemId = json_decode($product->item_id, true);
    //         $ItemQty = json_decode($product->item_qty, true);
    //         foreach($ItemId as $Iid)
    //         {
    //             $item = DB::table('item')
    //             ->where('id', '=',$Iid)
    //             ->first();
    //             foreach($ItemQty as $Iqty)
    //             {                 
    //                 $temp[$item->item_name][$product->product_name]=$Iqty;
    //             }
    //         }
            
    //     }
    //     print_r($temp);
    //     exit();
    //     return redirect(url('add_production'))->with("success", "Product added successfully");
    // }
    public function add_production_post(Request $request)
    {
        echo "<pre>";
        $request->validate([
            'product_category' => 'required',
            'product_id' => 'required|array',
            'product_qty' => 'required|array'
        ]);
        
        $ProductId = $request->product_id; 
        $ProductQty = $request->product_qty; 
        $temp = [];
        
        foreach ($ProductId as $key => $Pid) {
            $product = DB::table('product')
                ->where('id', $Pid)
                ->first();
        
            if (!$product) {
                continue; // Skip if no product found
            }
        
            $ItemIds = json_decode($product->item_id, true);
            $ItemQtys = json_decode($product->item_qty, true);
            
            if (!is_array($ItemIds) || !is_array($ItemQtys)) {
                continue; // Skip if decoding failed
            }
        
            $currentProductQty = $ProductQty[$key]; // Get the corresponding product quantity
        
            foreach ($ItemIds as $index => $Iid) {
                $item = DB::table('item')
                    ->where('id', $Iid)
                    ->first();
        
                if (!$item) {
                    continue; // Skip if item not found
                }
        
                if (isset($ItemQtys[$index])) {
                    // Multiply ItemQty with the corresponding ProductQty
                    $temp[$item->id][$product->product_name] = $ItemQtys[$index] * $currentProductQty;
                }
            }
        }

        // print_r($temp);
        // echo "<br>";

        // foreach ($temp as $key => $values) {
        //     $temp[$key] = array_sum($values);
        //     // $item_stock = DB::table('item')
        //     //         ->where('id', $temp[$key])
        //     //         ->first();
        //     //     echo "$item_stock->item_stock";

        // }
        // foreach ($temp as $key => $values) {
        //     // Check if $values is an array and get the correct ID
        //     $item_id = $key; // Get the first value if it's an array
        //     $item_values = is_array($values) ? reset($values) : $values; // Get the first value if it's an array
            
        //     $item_stock = DB::table('item')
        //         ->where('id', $item_id) // Use correct item_id
        //         ->first();
        
        //     if ($item_stock) {
                
        //         echo "$item_stock->item_name ".":"." $item_stock->item_stock"; // Safe to access
        //         echo "<br>";
        //         echo "$item_stock->item_stock - $item_values"; // Safe to access
        //         echo "<br>";
        //     } else {
        //         echo "Item not found for ID: $item_id"; // Handle missing items
        //         echo "<br>";
        //     }
        // }
printf("%-25s | %-10s | %-10s | %-10s\n", "Item Name", "Stock", "Value", "Remaining Stock");
                printf("%-25s | %-10s | %-10s | %-10s\n", str_repeat("-", 25), str_repeat("-", 10), str_repeat("-", 10), str_repeat("-", 10));

        foreach ($temp as $key => $values) {
            // Use key as item ID
            
            // $temp[$key] = array_sum($values);
            $item_id = $key;
            // If values is an array, take the first value, otherwise use the value itself
            // $item_values = is_array($values) ? reset($values) : $values;
        
            // Fetch item from the database
            $item_stock = DB::table('item')
                ->where('id', $item_id)
                ->first();
                
        
            if ($item_stock) {
                // Convert both values to numeric before subtraction
                $stock_qty = (float) $item_stock->item_stock;
                $item_val = (float) array_sum($values);
                $remaining_stock = $stock_qty - $item_val;
        
                // echo "$item_stock->item_name: $item_stock->item_stock"; // Safe to access
                // echo "<br>";
                // echo "$item_stock->item_name | $item_stock->item_stock | $item_val | $remaining_stock"; // Safe to access
                // echo "<br>";
                // echo "$stock_qty - $item_val = $remaining_stock"; // Subtract safely
                // echo "<br>";
                $items[] = [
                    'name' => $item_stock->item_name,
                    'stock' => $item_stock->item_stock,
                    'value' => $item_val,
                    'remaining' => $remaining_stock
                ];

                

// printf("%-25s | %-10s | %-10s | %-10s\n", $item_stock->item_name, $item_stock->item_stock, $item_val, $remaining_stock);
                

            } else {
                echo "Item not found for ID: $item_id"; // Handle missing items
                echo "<br>";
            }
        }
        
        $pdf = Pdf::loadView('stock_report', compact('items'))->setPaper('A4', 'portrait');

    ob_end_clean(); // Ensure no output is sent before PDF generation
    $fileName = 'stock_details_' . date('Ymd_His') . '.pdf';
    return $pdf->download($fileName);
        
        // print_r($temp);
        // exit(); 
        
        // return redirect(url('add_production'))->with("success", "Product added successfully");
    }


    // public function add_production_post(Request $request)
    // {
    //     echo "<pre>";
    //     print_r($request->all());
    //     // exit();
    //     // dd($request->all());

    //     $request->validate([
    //         'product_id' => 'required|array',
    //         'product_category' => 'required',
    //         'product_qty' => 'required|array'
    //     ]);

    //     // try {
    //         $user_type = Session::get('session_name');

    //         // $ProductQty = $request->product_qty; 
    //         $ProductId = $request->product_id; 
    //         $ProductQty = $request->product_qty; 

    //         $length = min(count($ProductId), count($ProductQty));
    //         $result=[];
    //         $Pid=[];
    //         for ($i = 0; $i < $length; $i++) {

    //             $product = DB::table('product')
    //             ->where('id', '=',$ProductId[$i])
    //             ->first();
    //             $ItemQty = json_decode($product->item_qty, true);
    //             $ItemId = json_decode($product->item_id, true);
    //             $length1=count($ItemId);
    //                 $temp = [];
    //                 $temp1 = [];
    //                 foreach ($ItemQty as $Iqty)
    //                 {
    //                     $temp[]=$ProductQty[$i] * $Iqty;
    //                 }
    //                 $result[]= $temp;
    //                 foreach ($ItemId as $Iid)
    //                 {
    //                     $item = DB::table('item')
    //                     ->where('id', '=',$Iid)
    //                     ->first();
    //                     // $temp1[$Iid=>$item->item_name]=$item->item_name;
    //                     // $temp1[$Iid] = $item->item_name;
    //                     $temp1[$Iid] = $temp;
    //                 }
                    
    //                 // for ($j = 0; $j < $length1; $j++)
    //                 // {
    //                 //     $item = DB::table('item')
    //                 //     ->where('id', '=',$ItemId[$j])
    //                 //     ->first();
    //                 //     $temp1[]=$item->item_name;
    //                 // }
                    
                    
    //                 $Pid[]=$temp1;

    //         }
    //         echo "<br>";
    //                 print_r($Pid);
    //                 // print_r($result);

    //             exit();

                            

    //         return redirect(url('add_production'))->with("success", "Product added successfully");

        

    //         // return redirect(url('add_product'))->with("error", "Product adding Failed, try again");


    // }
   
}