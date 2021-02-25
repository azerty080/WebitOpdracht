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


    public function bids() {
        return $this->hasMany(Bid::class);
    }


    public function images() {
        return $this->hasMany(Image::class);
    }
}
