<?php

namespace App\Http\Controllers;
use App\Order;
use App\Warehouse;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
      * Display a listing of the resource.
      *@return Response
      */
    public function index()
    {
      $order = Order::all();
      if(empty($order)){echo "NO resutls found"; return;}
      return $order;
    }

    /**
      * Display the specified resource.
      *@param  int  $id
      *@return Response
      */
    public function getByID($id)
    {
      $order = Order::find($id);
      if (empty($order)){echo "No results For id " . $id; return;}
      return $order;
    }

    /**
      * Display the specified resource.
      *@param  Request $Request
      *@return Response
      */
    public function store(Request $request)
    {
      $order = new Order;
      $order->issuingofficername = $request->input('issuingofficername');
      $order->supplycompanyname = $request->input('supplycompanyname');
      $order->supplyofficername = $request->input('supplyofficername');
      $order->warehouse = $request->input('warehouse');
      $order->numberofcartons = $request->input('numberofcartons');
      $order->quantityliters = $request->input('quantityliters');
      $order->priceperitem = $request->input('priceperitem');
      $order->total = $request->input('total');
      $order->notes = $request->input('notes');
      $order->save();
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
      $order = Order::find($id);
      if (empty($order)){echo "no results found"; return;}
      $order->issuingofficername = $request->input('issuingofficername');
      $order->supplycompanyname = $request->input('supplycompanyname');
      $order->supplyofficername = $request->input('supplyofficername');
      $order->warehouse = $request->input('warehouse');
      $order->numberofcartons = $request->input('numberofcartons');
      $order->quantityliters = $request->input('quantityliters');
      $order->priceperitem = $request->input('priceperitem');
      $order->total = $request->input('total');
      $order->notes = $request->input('notes');
      $order->save();
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
      $order = Order::find($id);
      if (empty($order)){echo "No results For Matching"; return;}
      $order->delete();
      echo "Item has been Deleted.";
      return;
}
}