<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

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
}
