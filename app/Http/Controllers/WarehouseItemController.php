<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Warehouse;
use App\WarehouseItem;
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
}
