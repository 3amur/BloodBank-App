<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Government extends Model 
{
    use HasFactory;
    protected $table = 'governments';
    public $timestamps = true;
    protected $fillable = array('name');

    public function cities()
    {
        return $this->hasMany(City::class);
    }
    
    public function clients()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

}