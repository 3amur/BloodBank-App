<?php

namespace App\Models;

use App\Models\BloodType;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_age', 'blood_type_id', 'bags_number', 'hospital_name', 'hospital_address', 'patient_phone', 'details', 'latitude', 'longitude', 'client_id','city_id');

    public function notifications(){
        return $this->hasMany(Notification::class);
    }
    public function bloodType(){
        return $this->belongsTo(BloodType::class);
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }


}