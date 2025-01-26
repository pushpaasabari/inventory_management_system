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
            $category = DB::table('category')->get();

            return view('add_product', compact('category'));
        } else {
            return redirect(url('index'))->with("fail", "Only Admin's can do Sales");
        }
    }
    private function generateNextBillNumber($lastBillNumber)
    {
        // Define your prefix and suffix
        $prefix = 'SALE/24-25/';

        if ($lastBillNumber) {
            // Extract the numeric part
            $lastNumber = (int) substr($lastBillNumber, strlen($prefix));
            // Increment the number
            $nextNumber = $lastNumber + 1;
        } else {
            // Start with 1 if no previous bill number
            $nextNumber = 1;
        }

        // Format the number with leading zeros if needed
        $nextBillNumber = $prefix . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        return $nextBillNumber;
    }

    public function product_category()
    {
        $list_product_category = DB::table('product_category')->where('product_category_status', 1)->get();
        return view('product_category', compact('list_product_category') ?? null);
        // return view('unit');
    }

    public function add_product_category_post(Request $request)
    {
        // dd($request->all());
        // exit();         
        $request->validate([
            'product_category_name' => 'required'
        ]);
        

        try {
            DB::table('product_category')->insert([
                'product_category_name' => $request->category_name,
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