<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use App\Models\Log;

class ProductController extends Controller
{
    public function add_product()
    {
        $user_type = Session::get('session_user_type');
        // if ($user_type == 'admin') {
        if ($user_type) {
            $product_category = DB::table('product_category')->get();
            $item = DB::table('item')->where('item_status', 1)->where('item_stock', '>', 0)->get();

            return view('add_product', compact('product_category','item'));
        } else {
            return redirect(url('index'))->with("fail", "Only Admin's can do Sales");
        }
    }

    public function add_product_post(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();

        $request->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'item_id' => 'required|array',
            'item_qty' => 'required|array'
        ]);

        try {
            $user_type = Session::get('session_name');

            $itemIdsJson = json_encode($request->item_id);
            $itemQtysJson = json_encode($request->item_qty);

            $product = DB::table('product')->insert([
                'product_name' => $request->product_name,
                'product_category' => $request->product_category,
                'item_id' => $itemIdsJson,
                'item_qty' => $itemQtysJson,
                'product_created_at' => Carbon::now(),
                'product_updated_at' => Carbon::now(),
                'product_status' =>1
            ]);

            // dd($product);
            // exit();

            // $saleID = DB::table('sale')
            //     ->where('sale_bill', $request->sale_bill)
            //     ->get('id')
            //     ->first();

            // foreach ($request->item_id as $index => $itemId) {
            //     DB::table('sale_item')->insert([
            //         'sale_id' => $saleID->id,
            //         'sale_bill' => $request->sale_bill,
            //         'sale_date' => $request->sale_date,
            //         'customer_name' => $request->customer_name,
            //         'item_id' => $itemId,
            //         'item_hsn' => $request->item_hsn[$index],
            //         'item_name' => $request->item_name[$index],
            //         'item_mrp' => $request->item_mrp[$index],
            //         'item_qty' => $request->item_qty[$index],
            //         'item_sale_price' => $request->item_sale[$index],
            //         'item_amount' => $request->item_amount[$index],
            //         'created_at' => Carbon::now(),
            //         'updated_at' => Carbon::now(),
            //     ]);

                Log::create([
                    'level' => 'info',
                    'message' => 'Product added to inventory',
                    'context' => [
                        'item_name' => $request->product_name,
                        'user_type' => Session::get('session_user_type'),
                        'user_name' => Session::get('session_name'),
                    ],
                ]);

            //     $getstock = DB::table('item')
            //         ->where('id', $itemId)
            //         ->get('item_stock')
            //         ->first();

            //     if (!$getstock->item_stock) {
            //         return redirect(url('add_sale'))->with("error", "Out Of Stock");
            //     } else {
            //         $updatedstock = $getstock->item_stock - $request->item_qty[$index];
            //         DB::table('item')->where('id', $itemId)
            //             ->update([
            //                 'item_stock' => $updatedstock,
            //                 'item_updated_at' => Carbon::now()
            //             ]);
            //     }
            // }
            return redirect(url('add_product'))->with("success", "Product added successfully");

        } catch (\Exception $e) {
            // Log the failure
            Log::create([
                'level' => 'error',
                'message' => 'Failed to add Product to inventory',
                'context' => [
                    'error_message' => $e->getMessage(),
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('add_product'))->with("error", "Product adding Failed, try again");
        }

    }

    public function product_category()
    {
        $list_product_category = DB::table('product_category')->where('product_category_status', 1)->get();
        return view('product_category', compact('list_product_category') ?? null);
        // return view('unit');
    }

    public function product_category_post(Request $request)
    {
        // dd($request->all());
        // exit();         
        $request->validate([
            'product_category_name' => 'required'
        ]);
        

        try {
            DB::table('product_category')->insert([
                'product_category_name' => $request->product_category_name,
                'product_category_created_at' => Carbon::now(),
                'product_category_updated_at' => Carbon::now(),
                'product_category_status' => 1
            ]);

            // Log the item addition
            Log::create([
                'level' => 'info',
                'message' => 'Product Category added to inventory',
                'context' => [
                    'item_name' => $request->item_name,
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('product_category'))->with("success", "Product Category added successfully");
        } catch (\Exception $e) {
            // Log the failure
            Log::create([
                'level' => 'error',
                'message' => 'Failed to add Product Category to inventory',
                'context' => [
                    'error_message' => $e->getMessage(),
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('product_category'))->with("error", "Product Category adding Failed, try again");
        }
    }
}