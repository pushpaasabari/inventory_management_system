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
            $customer = DB::table('customer')->get();
            $item = DB::table('item')->where('item_status', 1)->where('item_stock', '>', 0)->get();
            // Fetch the last sale bill number
            $lastSale = DB::table('sale')->orderBy('sale_bill', 'desc')->first();
            $nextBillNumber = $this->generateNextBillNumber($lastSale ? $lastSale->sale_bill : null);
            return view('add_production', compact('customer', 'item', 'nextBillNumber'));
        } else {
            return redirect(url('index'))->with("fail", "Only Admin's can do Sales");
        }
        // return view('add_production');
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
}
