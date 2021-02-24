<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $table = 'bids';

	protected $fillable = [
        'price',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

	public function item() {
		return $this->belongsTo('App\Item');
	}
}
