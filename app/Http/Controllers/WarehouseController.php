<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Warehouse;
class WarehouseController extends Controller
{
 /**
      * Display a listing of the resource.
      *@return Response
      */
    public function index()
    {
      $warehouses = Warehouse::all();
      if(empty($warehouses)){echo "NO resutls found"; return;}
      return $warehouses;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function getByID($id)
    {
      $warehouse = Warehouse::find($id);
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
      $warehouse = new Warehouse;
      $warehouse->name = $request->input('name');
      $warehouse->address = $request->input('address');
      $warehouse->region = $request->input('region');
      $warehouse->phone = $request->input('phone');
      $warehouse->size = $request->input('size');
      $warehouse->capacity = $request->input('capacity');
      $warehouse->hoursofactivity = $request->input('hoursofactivity');
      $warehouse->description = $request->input('description');
      $warehouse->save();
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
      $warehouse = Warehouse::find($id);
      if (empty($warehouse)){echo "no results found"; return;}
      $warehouse->name = $request->input('name');
      $warehouse->address = $request->input('address');
      $warehouse->region = $request->input('region');
      $warehouse->phone = $request->input('phone');
      $warehouse->size = $request->input('size');
      $warehouse->capacity = $request->input('capacity');
      $warehouse->hoursofactivity = $request->input('hoursofactivity');
      $warehouse->description = $request->input('description');
      $warehouse->save();
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
      $warehouse = Warehouse::find($id);
      if (empty($warehouse)){return;}
      $warehouse->delete();
      return;
    }
}
