<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	protected $fillable = [
        'title', 'description', 'component_id',
    ];

    public function Component(){
        return $this->belongsTo('App\Component');
    }
}
