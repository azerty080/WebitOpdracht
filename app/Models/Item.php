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
        'description',
        'image_path'
    ];


    public function business() {
        return $this->hasMany('App\Bid');
    }
}
