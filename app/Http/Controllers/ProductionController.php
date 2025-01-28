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
        // echo "<pre>";
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

            foreach ($request->product_id as $index => $product_id) 
            {
                $product = DB::table('product')
                            ->where('id', '=',$product_id)
                            ->first();
                //dd($request->product_qty * json_decode($product->item_id));
                dd($decodedItemId = json_decode($product->item_qty, true)); // Decode as an associative array

if (is_array($decodedItemId)) {
    $quantity = (float) $request->product_qty; // Ensure the quantity is numeric

    foreach ($decodedItemId as $value) {
        // Ensure each value in the array is numeric
        $itemValue = (float) $value;

        // Perform multiplication
        $result = $quantity * $itemValue;

        // Output the result
        dd ("Quantity: {$quantity}, Item Value: {$itemValue}, Result: {$result}");
    }
} else {
    dd('Invalid item_id format'); // Handle cases where item_id is not a JSON array
}



            }              


//             $decodedItemId = json_decode($product->item_id, true); // Decode as an associative array

// if (is_array($decodedItemId) && isset($decodedItemId[0])) {
//     $value = $decodedItemId[0]; // Example: Take the first item from the array
//     dd($request->product_qty * $value);
// } else {
//     dd('Invalid item_id format'); // Handle cases where the array is empty or improperly formatted.
// }

                // Log::create([
                //     'level' => 'info',
                //     'message' => 'Product added to inventory',
                //     'context' => [
                //         'item_name' => $request->product_name,
                //         'user_type' => Session::get('session_user_type'),
                //         'user_name' => Session::get('session_name'),
                //     ],
                // ]);


            return redirect(url('add_production'))->with("success", "Product added successfully");

        // } catch (\Exception $e) {
            // Log the failure
            // Log::create([
            //     'level' => 'error',
            //     'message' => 'Failed to add Product to inventory',
            //     'context' => [
            //         'error_message' => $e->getMessage(),
            //         'user_type' => Session::get('session_user_type'),
            //         'user_name' => Session::get('session_name'),
            //     ],
            // ]);

            // return redirect(url('add_product'))->with("error", "Product adding Failed, try again");
        // }

    }
   
}