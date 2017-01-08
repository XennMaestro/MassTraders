<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
  /**
     * Get the warehouseitems for the warehouse.
  */
    public function warehouseitems()
    {
        return $this->hasMany('App\WarehouseItem');
    }
}
