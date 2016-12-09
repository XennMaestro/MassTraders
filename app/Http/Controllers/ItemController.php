<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
 /**
      * Display a listing of the resource.
      *@return Response
      */
    public function index()
    {
      $item = Item::all();
      if(empty($item)){echo "NO resutls found"; return;}
      return $item;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function getByID($id)
    {
      $item = Item::find($id);
      if (empty($item)){echo "No results For id " . $id; return;}
      return $item;
    }

    /**
      * Display the specified resource.
      *@param  Request $Request
      *@return Response
      */
    public function store(Request $request)
    {
      $item = new Item;
      $item->product = $request->input('product');
      $item->strength = $request->input('strength');
      $item->packaging = $request->input('packaging');
      $item->save();
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
      $item = Item::find($id);
      if (empty($item)){echo "no results found"; return;}
      $item->product = $request->input('product');
      $item->strength = $request->input('strength');
      $item->packaging = $request->input('packaging');
      $item->save();
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
      $item = Item::find($id);
      if (empty($item)){echo "No results For Matching";return;}
      $item->delete();
      echo "Item has been Deleted.";
      return;
    }
}
