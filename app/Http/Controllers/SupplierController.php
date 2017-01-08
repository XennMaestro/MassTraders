<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SupplierController extends Controller
{
 /**
      * Display a listing of the resource.
      *@return Response
      */
    public function index()
    {
      $supplier = Supplier::all();
      if(empty($supplier)){echo "NO resutls found"; return;}
      return $supplier;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function getByID($id)
    {
      $supplier = Supplier::find($id);
      if (empty($supplier)){echo "No results For id " . $id; return;}
      return $supplier;
    }

    /**
      * Display the specified resource.
      *@param  Request $Request
      *@return Response
      */
    public function store(Request $request)
    {
      $supplier = new Supplier;
      $supplier->name = $request->input('name');
      $supplier->address = $request->input('address');
      $supplier->region = $request->input('region');
      $supplier->phone = $request->input('phone');
      $supplier->hoursofactivity = $request->input('hoursofactivity');
      $supplier->description = $request->input('description');
      $supplier->save();
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
      $supplier = Supplier::find($id);
      if (empty($supplier)){echo "no results found"; return;}
      $supplier->name = $request->input('name');
      $supplier->address = $request->input('address');
      $supplier->region = $request->input('region');
      $supplier->phone = $request->input('phone');
      $supplier->hoursofactivity = $request->input('hoursofactivity');
      $supplier->description = $request->input('description');
      $supplier->save();
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
      $supplier = Supplier::find($id);
      if (empty($supplier)){echo "No results For Matching"; return;}
      $supplier->delete();
      echo "Item has been Deleted.";
      return;
    }
    
    public function excel() {

    $suppliers = Supplier::all();    
    // Initialize the array which will be passed into the Excel
    // generator.
    $suppliersArray = []; 
            
    // Define the Excel spreadsheet headers
    $suppliersArray[] = ['id', 'created_at', 'updated_at', 'name','address','region', 'phone', 'hoursofactivity', 'description',];

    // Convert each member of the returned collection into an array,
    // and append it to the payments array.
    foreach ($suppliers as $supplier) {
        $suppliersArray[] = $supplier->toArray();
    }

    // Generate and return the spreadsheet
    Excel::create('suppliers', function($excel) use ($suppliersArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Suppliers');
        $excel->setCreator('Laravel')->setCompany('Tariq Awan, Mass Traders');
        $excel->setDescription('supplier file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($suppliersArray) {
            $sheet->fromArray($suppliersArray, null, 'A1', false, false);
        });

    })->download('xlsx');
}
}
