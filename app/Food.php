<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'makanan';
    protected $fillable = [
        'nama', 'foto', 'harga',
    ];
    public $timestamps = false;
}
