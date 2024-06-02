<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model 
{
    use HasFactory;

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'government_id');

    public function government()
    {
        return $this->belongsTo(Government::class);
    }
    
    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}