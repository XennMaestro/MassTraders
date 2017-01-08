<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VendorController extends Controller
{
 /**
      * Display a listing of the resource.
      *@return Response
      */
    public function index()
    {
      $vendor = Vendor::all();
      if(empty($vendor)){echo "NO resutls found"; return;}
      return $vendor;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function getByID($id)
    {
      $vendor = Vendor::find($id);
      if (empty($vendor)){echo "No results For id " . $id; return;}
      return $vendor;
    }

    /**
      * Display the specified resource.
      *@param  Request $Request
      *@return Response
      */
    public function store(Request $request)
    {
      $vendor = new Vendor;
      $vendor->name = $request->input('name');
      $vendor->address = $request->input('address');
      $vendor->region = $request->input('region');
      $vendor->phone = $request->input('phone');
      $vendor->hoursofactivity = $request->input('hoursofactivity');
      $vendor->description = $request->input('description');
      $vendor->save();
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
      $vendor = Vendor::find($id);
      if (empty($vendor)){echo "no results found"; return;}
      $vendor->name = $request->input('name');
      $vendor->address = $request->input('address');
      $vendor->region = $request->input('region');
      $vendor->phone = $request->input('phone');
      $vendor->hoursofactivity = $request->input('hoursofactivity');
      $vendor->description = $request->input('description');
      $vendor->save();
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
      $vendor = Vendor::find($id);
      if (empty($vendor)){echo "No results For Matching"; return;}
      $vendor->delete();
      echo "Item has been Deleted.";
      return;
    }
    
    public function excel() {

    $vendors = Vendor::all();
        
    // Initialize the array which will be passed into the Excel
    // generator.
    $vendorsArray = []; 

    // Define the Excel spreadsheet headers
    $vendorsArray[] = ['id', 'created_at', 'updated_at', 'name','address','region', 'phone', 'hoursofactivity', 'description',];

    // Convert each member of the returned collection into an array,
    // and append it to the payments array.
    foreach ($vendors as $vendor) {
        $vendorsArray[] = $vendor->toArray();
    }

    // Generate and return the spreadsheet
    Excel::create('vendors', function($excel) use ($vendorsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Vendors');
        $excel->setCreator('Laravel')->setCompany('Tariq Awan, Mass Traders');
        $excel->setDescription('vendor file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($vendorsArray) {
            $sheet->fromArray($vendorsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
}
}
