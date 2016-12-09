<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

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
}
