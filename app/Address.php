<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

  protected $fillable = ['address', 'city', 'state', 'country', 'postal_code', 'seller_id'];


  
  public function seller() {
    return $this->belongsTo('App\Seller');
  }
  
}
