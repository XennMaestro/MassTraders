<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Warehouse;
use App\WarehouseItem;
use Maatwebsite\Excel\Facades\Excel;

class WarehouseItemController extends Controller
{
 /**
      * Display a listing of the resource.
      *@return Response
      */
    public function index()
    {
      $warehouseitems = WarehouseItem::all();
      if(empty($warehouseitems)){echo "NO resutls found"; return;}
      return $warehouseitems;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function getByID($id)
    {
      $warehouse = Warehouse::find($id)->warehouseitems;
      if (empty($warehouse)){echo "No results For id " . $id; return;}
      return $warehouse;
    }

    /**
      * Display the specified resource.
      *@param  Request $Request
      *@return Response
      */
    public function store(Request $request)
    {
      $warehouseitems = new WarehouseItem;
      $warehouseitems->productname = $request->input('productname');
      $warehouseitems->strength = $request->input('strength');
      $warehouseitems->packaging = $request->input('packaging');
      $warehouseitems->quantity = $request->input('quantity');
      $warehouseitems->notes = $request->input('notes');
      $warehouseitems->warehouse_id = $request->input('warehouse_id');
      $warehouseitems->save();
      echo "warehouseitem has been Stored.";
      return;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function update($id, Request $request)
    {
      $warehouseitems = WarehouseItem::find($id);
      if (empty($warehouseitems)){echo "no results found"; return;}
      $warehouseitems->productname = $request->input('productname');
      $warehouseitems->strength = $request->input('strength');
      $warehouseitems->packaging = $request->input('packaging');
      $warehouseitems->quantity = $request->input('quantity');
      $warehouseitems->notes = $request->input('notes');
      $warehouseitems->warehouse_id = $request->input('warehouse_id');
      $warehouseitems->save();
      echo "warehouseitem has been updated.";
      return;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function destroy($id)
    {
      $warehouseitems = WarehouseItem::find($id);
      if (empty($warehouseitems)){return;}
      $warehouseitems->delete();
      echo "Item Deleted";
      return;
    }
    
    public function excel() {

    $warehouseitems = WarehouseItem::all();  
        
    // Initialize the array which will be passed into the Excel
    // generator.
    $warehousesArray = []; 

    // Define the Excel spreadsheet headers
    $warehousesArray[] = ['id', 'created_at', 'updated_at', 'product name','strength','packaging', 'quantity', 'notes', 'warehouse ID',];

    // Convert each member of the returned collection into an array,
    // and append it to the payments array.
    foreach ($warehouseitems as $warehouseitem) {
        $warehousesArray[] = $warehouseitem->toArray();
    }

    // Generate and return the spreadsheet
    Excel::create('warehouseitems', function($excel) use ($warehousesArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Warehouseitems');
        $excel->setCreator('Laravel')->setCompany('Tariq Awan, Mass Traders');
        $excel->setDescription('warehouseitems file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($warehousesArray) {
            $sheet->fromArray($warehousesArray, null, 'A1', false, false);
        });

    })->download('xlsx');
}
}
