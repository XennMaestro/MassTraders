<?php

namespace App\Http\Controllers;
use App\Sale;
use Illuminate\Http\Request;

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
      $sale = new Sale;
      $sale->issuingofficername = $request->input('issuingofficername');
      $sale->vendorname = $request->input('vendorname');
      $sale->salesofficername = $request->input('salesofficername');
      $sale->recipientname = $request->input('recipientname');
      $sale->warehouse = $request->input('warehouse');
      $sale->numberofcartons = $request->input('numberofcartons');
      $sale->quantityliters = $request->input('quantityliters');
      $sale->priceperitem = $request->input('priceperitem');
      $sale->total = $request->input('total');
      $sale->amountpaid = $request->input('amountpaid');
      $sale->notes = $request->input('notes');
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
      $sale->issuingofficername = $request->input('issuingofficername');
      $sale->vendorname = $request->input('vendorname');
      $sale->salesofficername = $request->input('salesofficername');
      $sale->recipientname = $request->input('recipientname');
      $sale->warehouse = $request->input('warehouse');
      $sale->numberofcartons = $request->input('numberofcartons');
      $sale->quantityliters = $request->input('quantityliters');
      $sale->priceperitem = $request->input('priceperitem');
      $sale->total = $request->input('total');
      $sale->amountpaid = $request->input('amountpaid');
      $sale->notes = $request->input('notes');
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
      $sale->delete();
      echo "Item has been Deleted.";
      return;
}
}