<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * Get the phone record associated with the user.
     */
    public function warehouseitems()
    {
        return $this->hasOne('App\WarehouseItem');
    }
}
