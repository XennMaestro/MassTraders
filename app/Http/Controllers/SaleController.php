<?php

namespace App\Http\Controllers;
use App\Sale;
use App\WarehouseItem;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
  /**
      * Display a listing of the resource.
      *@return Response
      */
    public function index()
    {
      $sale = Sale::all();
      if(empty($sale)){echo "NO resutls found"; return;}
      return $sale;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function getByID($id)
    {
      $sale = Sale::find($id);
      if (empty($sale)){echo "No results For id " . $id; return;}
      return $sale;
    }

    /**
      * Display the specified resource.
      *@param  Request $Request
      *@return Response
      */
    public function store(Request $request)
    {
      $id = $request->input('warehouseitem_id');
      $quantityPurchased = $request->input('numberofitems');
         
      $warehouseitem = WarehouseItem::find($id);
      if (empty($warehouseitem)){echo "No results For id " . $id; return;}
      $previousQuantity= $warehouseitem->quantity;
      $newQuantity= $previousQuantity - $quantityPurchased;     
      $warehouseitem->quantity = $newQuantity;
      $warehouseitem->save();
      
      echo "warehouse item quantity has been Updated. \n";  
        
      $sale = new Sale;
      $sale->issuingofficername = $request->input('issuingofficername');
      $sale->vendorname = $request->input('vendorname');
      $sale->salesofficername = $request->input('salesofficername');
      $sale->recipientname = $request->input('recipientname');
      $sale->numberofitems = $request->input('numberofitems');
      $sale->quantityofliters = $request->input('quantityofliters');
      $sale->priceperitem = $request->input('priceperitem');
      $sale->total = $request->input('total');
      $sale->amountpaid = $request->input('amountpaid');
      $sale->notes = $request->input('notes');
      $sale->warehouseitem_id = $request->input('warehouseitem_id');
      $sale->save();
      echo "item has been Stored.";
      return;   
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function update($id, Request $request)
    {
      $sale = Sale::find($id);
      if (empty($sale)){echo "no results found"; return;}
      $sale->amountpaid = $request->input('amountpaid');
      $sale->save();
      echo "Item has been updated.";
      return;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function destroy($id)
    {
      $sale = Sale::find($id);
      if (empty($sale)){echo "No results For Matching"; return;}
      
      $warehouseID= $sale->warehouseitem_id;
    
      $warehouseitem = WarehouseItem::find($warehouseID);
      if (empty($warehouseitem)){echo "No results For id " . $id; return;} 
      $purchasedQuantity = $sale->numberofitems;
      $existingQuantity = $warehouseitem->quantity;    
      $newQuantity = $existingQuantity + $purchasedQuantity;
      $warehouseitem->quantity = $newQuantity; 
      $warehouseitem->save();  
        
      $sale->delete();
      echo "Item has been Deleted.";
      return;
}
    public function excel() {

    $sales = Sale::all();
        
    // Initialize the array which will be passed into the Excel
    // generator.
    $salesArray = []; 

    // Define the Excel spreadsheet headers
    $salesArray[] = ['id', 'created_at', 'updated_at', 'issuingofficername','vendorname','salesofficername', 'recipientname', 'numberofitems', 'quantityofliters','priceperitem', 'total','amountpaid', 'notes', 'warehouseitem_id'];

    // Convert each member of the returned collection into an array,
    // and append it to the payments array.
    foreach ($sales as $sale) {
        $salesArray[] = $sale->toArray();
    }

    // Generate and return the spreadsheet
    Excel::create('sales', function($excel) use ($salesArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Sales');
        $excel->setCreator('Laravel')->setCompany('Tariq Awan, Mass Traders');
        $excel->setDescription('sale file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($salesArray) {
            $sheet->fromArray($salesArray, null, 'A1', false, false);
        });

    })->download('xlsx');
}
}