<?php

namespace App\Models;

use App\Models\Token;
use Hamcrest\Xml\HasXPath;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model 
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'd_o_b', 'blood_type_id','last_donation_date', 'city_id', 'phone', 'bin_code', 'password');
    protected $hidden = [
        'password',
    ];
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany('App\Models\Notification', 'clientable');
    }

    public function bloodTypes()
    {
        return $this->morphedByMany('App\Models\BloodType', 'clientable');
    }

    public function governments()
    {
        return $this->morphedByMany('App\Models\Government', 'clientable');
    }
    // belongs to Changed
    public function cities()
    {
        return $this->morphedByMany('App\Models\City', 'clientable');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }
    
    public function tokens(){
        return $this->hasMany(Token::class);
    }

}