<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use App\Models\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;

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
            // return view('add_production', compact('product_category'));
        } else {
            return redirect(url('add_production'))->with("error", "Only Admin's can do Sales");
        }
    }

    
    public function add_production_post(Request $request)
    {
        // $connector = new WindowsPrintConnector("Everycom-58-Series");
        // $printer = new Printer($connector);

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
        foreach ($temp as $key => $values) {
            $item_id = $key;
            $item_stock = DB::table('item')
                ->where('id', $item_id)
                ->first();
            if ($item_stock) {
                $stock_qty = (float) $item_stock->item_stock;
                $item_val = (float) array_sum($values);
                $remaining_stock = $stock_qty - $item_val;

                $items[] = [
                    'name' => $item_stock->item_name,
                    'stock' => $item_stock->item_stock,
                    'value' => $item_val,
                    'remaining' => $remaining_stock
                ];
            } else {
                echo "Item not found for ID: $item_id"; // Handle missing items
                echo "<br>";
            }
        }
        
        $pdf = Pdf::loadView('stock_report', compact('items'))->setPaper('A4', 'portrait');
        ob_end_clean(); // Ensure no output is sent before PDF generation
        $fileName = 'Stock_Details_' . date('Ymd_His') . '.pdf';
        return $pdf->download($fileName);
        return redirect(url('add_production'))->with("success", "Product added successfully");


        // $printer->setEmphasis(true);
        // $printer->text("STORE NAME\n");
        // $printer->setEmphasis(false);
        // $printer->text("Date: " . date("Y-m-d H:i:s") . "\n");
        // $printer->text("====================\n");

        // foreach ($items as $item) {
        //     $printer->text($item['name'] . " " . $item['stock'] . " " . $item['value'] . " " . $item['remaining'] . "\n");
        // }
        // $printer->text("====================\n");
        // $printer->setEmphasis(true);
        // $printer->text("Total: ₹80\n");
        // $printer->setEmphasis(false);

        // $printer->feed(2);
        // $printer->cut();
        // $printer->close();

        // return "Receipt Printed Successfully";

    }

public function printReceipt()
    {
        try {
            // Change 'POS_PRINTER' to your printer's name or use network printer IP
            $connector = new WindowsPrintConnector("Everycom-58-Series");
            $printer = new Printer($connector);

            // Print text
            $printer->setEmphasis(true);
            $printer->text("STORE NAME\n");
            $printer->setEmphasis(false);
            $printer->text("Date: " . date("Y-m-d H:i:s") . "\n");
            $printer->text("====================\n");

            // Sample items
            $items = [
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Apple", "Qty" => 2, "Price" => 50],
                ["Item" => "Banana", "Qty" => 3, "Price" => 30]
            ];

            foreach ($items as $item) {
                $printer->text($item['Item'] . " x" . $item['Qty'] . " - ₹" . $item['Price'] . "\n");
            }

            $printer->text("====================\n");
            $printer->setEmphasis(true);
            $printer->text("Total: ₹80\n");
            $printer->setEmphasis(false);

            $printer->feed(2);
            $printer->cut();
            $printer->close();

            return "Receipt Printed Successfully";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

   
}