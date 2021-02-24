<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

	protected $fillable = [
        'title',
        'description'
    ];


    public function bid() {
        return $this->hasMany('App\Bid');
    }


    public function image() {
        return $this->hasMany('App\Image');
    }
}
