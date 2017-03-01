<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = ['name', 'price', 'description', 'seller_id'];


  
  public function seller() {
    return $this->hasOne('App\Seller');
  }

  public function reviews() {
    return $this->hasMany('App\Review');
  }

  public function tags() {
    return $this->belongsToMany('App\Tag');
  }

}
