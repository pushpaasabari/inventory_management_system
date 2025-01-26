<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Log;
use Session;

class InventoryController extends Controller
{
    public function add_item()
    {
        $user_type = Session::get('session_user_type');
        // if ($user_type == 'admin') {
        if ($user_type) {
            $category = DB::table('category')->get();
            $unit = DB::table('unit')->get();
            return view('add_item', compact('category','unit'));
        } else {
            return redirect(url('index'))->with("fail", "Only Admin's can add Item");
        }

    }
    
    public function fetch_unit_details(Request $request)
    {
        $get_unit_ajax['unit'] = DB::table('unit')
            ->where("id", $request->id)
            ->get()
            ->first();
        return response()->json($get_unit_ajax);
    }

    public function add_item_post(Request $request)
    {
        // dd($request->all());
        // exit();         
        $request->validate([
            'item_name' => 'required',
            'item_hsn' => 'required',
            // 'item_unit' => 'required',
            // 'item_desc' => 'required',
            'item_mrp' => 'required',
            'item_purchase' => 'required',
            // 'item_sale' => 'required'
        ]);

        try {
            DB::table('item')->insert([
                'item_name' => $request->item_name,
                'item_hsn' => $request->item_hsn,
                'unit_primary' => $request->unit_primary,
                'unit_secondary' => $request->unit_secondary,
                'unit_conversion' => $request->unit_conversion,
                // 'item_desc' => $request->item_desc,
                'item_desc' => $request->item_name,
                'item_mrp' => $request->item_mrp,
                'item_purchase' => $request->item_purchase,
                'item_sale' => $request->item_purchase,
                // 'item_sale' => $request->item_sale,
                'item_stock' => 0,
                'item_created_at' => Carbon::now(),
                'item_updated_at' => Carbon::now(),
                'item_status' => 1
            ]);

            // Log the item addition
            Log::create([
                'level' => 'info',
                'message' => 'Item added to inventory',
                'context' => [
                    'item_name' => $request->item_name,
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('list_item'))->with("success", "Item added successfully");
        } catch (\Exception $e) {
            // Log the failure
            Log::create([
                'level' => 'error',
                'message' => 'Failed to add item to inventory',
                'context' => [
                    'error_message' => $e->getMessage(),
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('add_item'))->with("error", "Item adding Failed, try again");
        }
    }

    public function unit()
    {
        $list_unit = DB::table('unit')->where('unit_status', 1)->get();
        return view('unit', compact('list_unit') ?? null);
        // return view('unit');
    }
    public function category()
    {
        $list_category = DB::table('category')->where('category_status', 1)->get();
        return view('category', compact('list_category') ?? null);
        // return view('unit');
    }
    
    public function add_unit_post(Request $request)
    {
        // dd($request->all());
        // exit();         
        $request->validate([
            'unit_primary' => 'required',
            'unit_pri_short' => 'required',
        ]);
        

        try {
            DB::table('unit')->insert([
                'unit_primary' => $request->unit_primary,
                'unit_pri_short' => $request->unit_pri_short,
                'unit_secondary' => $request->unit_secondary,
                'unit_sec_short' => $request->unit_sec_short,
                'unit_conversion' => $request->unit_conversion,
                'unit_created_at' => Carbon::now(),
                'unit_updated_at' => Carbon::now(),
                'unit_status' => 1
            ]);

            // Log the item addition
            Log::create([
                'level' => 'info',
                'message' => 'Unit added to inventory',
                'context' => [
                    'item_name' => $request->item_name,
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('unit'))->with("success", "Unit added successfully");
        } catch (\Exception $e) {
            // Log the failure
            Log::create([
                'level' => 'error',
                'message' => 'Failed to add unit to inventory',
                'context' => [
                    'error_message' => $e->getMessage(),
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('unit'))->with("error", "Unit adding Failed, try again");
        }
    }
    public function add_category_post(Request $request)
    {
        // dd($request->all());
        // exit();         
        $request->validate([
            'category_name' => 'required'
        ]);
        

        try {
            DB::table('category')->insert([
                'category_name' => $request->category_name,
                'category_created_at' => Carbon::now(),
                'category_updated_at' => Carbon::now(),
                'category_status' => 1
            ]);

            // Log the item addition
            Log::create([
                'level' => 'info',
                'message' => 'Category added to inventory',
                'context' => [
                    'item_name' => $request->item_name,
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('category'))->with("success", "Category added successfully");
        } catch (\Exception $e) {
            // Log the failure
            Log::create([
                'level' => 'error',
                'message' => 'Failed to add Category to inventory',
                'context' => [
                    'error_message' => $e->getMessage(),
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('category'))->with("error", "Category adding Failed, try again");
        }
    }

    public function list_item()
    {
        $list_item = DB::table('item')->where('item_status', 1)->get();
        $category = DB::table('category')->get();
        $unit = DB::table('unit')->get();
        return view('list_item', compact('list_item','category','unit'));
    }
    public function list_item_status()
    {
        $list_item_status = DB::table('item')->get();
        return view('list_item_status', compact('list_item_status'));
    }
    public function list_item_status_change($id, $item_status)
    {
        if ($item_status == 1) {
            DB::table('item')->where('id', $id)->update(['item_status' => 0, 'item_updated_at' => Carbon::now()]);
            return redirect()->back();
        } elseif ($item_status == 0) {
            DB::table('item')->where('id', $id)->update(['item_status' => 1, 'item_updated_at' => Carbon::now()]);
            return redirect()->back();
        } else {
            DB::table('item')->where('id', $id)->update(['item_status' => 0, 'item_updated_at' => Carbon::now()]);
            return redirect()->back();
        }
    }

    public function get_item(Request $request)
    {
        $item['item'] = DB::table('item')
            ->where("id", $request->id)
            ->get()
            ->first();
        $purchase_item['item'] = DB::table('purchase_item')
            ->where("item_id", $request->id)
            ->get();
        $sale_item['item'] = DB::table('sale_item')
            ->where("item_id", $request->id)
            ->get();
        return response()->json([
            'item' => $item,
            'purchase_item' => $purchase_item,
            'sale_item' => $sale_item
        ]);
    }
    public function get_unit(Request $request)
    {
        $unit['unit'] = DB::table('unit')
            ->where("id", $request->id)
            ->get()
            ->first();
        // $purchase_item['unit'] = DB::table('purchase_item')
        //     ->where("item_id", $request->id)
        //     ->get();
        // $sale_item['unit'] = DB::table('unit')
        //     ->where("item_id", $request->id)
        //     ->get();
        return response()->json([
            'unit' => $unit
            // 'purchase_item' => $purchase_item ?? null,
            // 'sale_item' => $sale_item ?? null
        ]);
    }
    public function get_category(Request $request)
    {
        $category['category'] = DB::table('category')
            ->where("id", $request->id)
            ->get()
            ->first();
        // $purchase_item['unit'] = DB::table('purchase_item')
        //     ->where("item_id", $request->id)
        //     ->get();
        // $sale_item['unit'] = DB::table('unit')
        //     ->where("item_id", $request->id)
        //     ->get();
        return response()->json([
            'category' => $category
            // 'purchase_item' => $purchase_item ?? null,
            // 'sale_item' => $sale_item ?? null
        ]);
    }

    public function edit_item(Request $request)
    {
        $get_item_ajax['item'] = DB::table('item')
            ->where("id", $request->id)
            ->get()
            ->first();
        return response()->json($get_item_ajax);
    }

    public function edit_item_post(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'item_hsn' => 'required',
            'item_unit' => 'required',
            'item_desc' => 'required',
            'item_mrp' => 'required',
            'item_purchase' => 'required',
            'item_sale' => 'required'
        ]);

        try {
            DB::table('item')->where('id', $request->item_id)
                ->update([
                    'item_name' => $request->item_name,
                    'item_hsn' => $request->item_hsn,
                    'item_unit' => $request->item_unit,
                    'item_desc' => $request->item_desc,
                    'item_mrp' => $request->item_mrp,
                    'item_purchase' => $request->item_purchase,
                    'item_sale' => $request->item_sale,
                    'item_stock' => $request->item_stock,
                    'item_updated_at' => Carbon::now()
                ]);

            // Log the item update
            Log::create([
                'level' => 'info',
                'message' => 'Item updated in inventory',
                'context' => [
                    'item_id' => $request->item_id,
                    'item_name' => $request->item_name,
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('list_item'))->with("success", "Item updated successfully");
        } catch (\Exception $e) {
            // Log the failure
            Log::create([
                'level' => 'error',
                'message' => 'Failed to update item in inventory',
                'context' => [
                    'error_message' => $e->getMessage(),
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
            ]);

            return redirect(url('list_item'))->with("error", "Item updating Failed, try again");
        }
    }

    public function exportInventory()
    {
        $user_type = Session::get('session_user_type');
        // if ($user_type == 'suadmin') {
        if ($user_type) {

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Add header row
            $sheet->setCellValue('A1', 'ID');
            $sheet->setCellValue('B1', 'Item Name');
            $sheet->setCellValue('C1', 'Stock');
            $sheet->setCellValue('D1', 'HSN');
            $sheet->setCellValue('E1', 'MRP');
            $sheet->setCellValue('F1', 'PURCHASE');
            $sheet->setCellValue('G1', 'SALE');
            $sheet->setCellValue('H1', 'DESC');
            $sheet->setCellValue('I1', 'UNIT');

            // Fetch data from the database
            $inventory = DB::table('item')->get();
            $row = 2;

            foreach ($inventory as $item) {
                $sheet->setCellValue('A' . $row, $item->id);
                $sheet->setCellValue('B' . $row, $item->item_name);
                $sheet->setCellValue('C' . $row, $item->item_stock);
                $sheet->setCellValue('D' . $row, $item->item_hsn);
                $sheet->setCellValue('E' . $row, $item->item_mrp);
                $sheet->setCellValue('F' . $row, $item->item_purchase);
                $sheet->setCellValue('G' . $row, $item->item_sale);
                $sheet->setCellValue('H' . $row, $item->item_desc);
                $sheet->setCellValue('I' . $row, $item->item_unit);
                $row++;
            }

            $writer = new Xlsx($spreadsheet);
            $fileName = 'item.xlsx';

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $fileName . '"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
            exit;
        } else {
            return redirect(url('index'))->with("fail", "Only Admin's can Export Item");
        }
    }

    public function importInventory()
    {
        return view('import');
    }

    public function importInventoryPost(Request $request)
    {
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue; // Skip header row
            }

            DB::table('item')->insert([
                'item_name' => $row[1],
                'item_stock' => $row[2],
                'item_hsn' => $row[3],
                'item_mrp' => $row[4],
                'item_purchase' => $row[5],
                'item_sale' => $row[6],
                'item_desc' => $row[7],
                'item_unit' => $row[8],
                'item_created_at' => Carbon::now(),
                'item_updated_at' => Carbon::now(),
                'item_status' => 1
            ]);
        }

        // Log the import
        Log::create([
            'level' => 'info',
            'message' => 'Inventory imported from Excel file',
            'context' => [
                    'file_name' => $request->file('excel_file')->getClientOriginalName(),
                    'user_type' => Session::get('session_user_type'),
                    'user_name' => Session::get('session_name'),
                ],
        ]);

        return back()->with('success', 'Inventory imported successfully.');
    }

    public function downloadPDF()
    {
        $data = ['list_item' => DB::table('item')->get()];
        $pdf = PDF::loadView('example', $data);

        $fileName = 'stock_details_' . date('Ymd_His') . '.pdf';

        return $pdf->download($fileName);
    }
}