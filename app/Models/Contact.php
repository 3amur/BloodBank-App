<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('name','email','phone','subject', 'message','client_id');

    public function client()
    {
        return $this->belongsTo('Client');
    }

}