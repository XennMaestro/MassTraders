<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseItem extends Model
{
    /**
     * Get the Warehouse that owns the warehouseitem.
     */
    public function warehouse()
    {
        return $this->belongsTo('App\Order');
    }
    
     /**
     * Get the Warehouse that owns the warehouseitem.
     */
    public function warehouse2()
    {
        return $this->belongsTo('App\Sale');
    }
    
    /**
     * Get the Warehouse that owns the warehouseitem.
     */
    public function warehouse1()
    {
        return $this->belongsTo('App\Warehouse');
    }
}
