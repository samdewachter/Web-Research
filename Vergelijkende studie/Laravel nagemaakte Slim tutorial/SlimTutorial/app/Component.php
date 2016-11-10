<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public function Tickets(){
        return $this->hasOne('App\Ticket');
    }
}
