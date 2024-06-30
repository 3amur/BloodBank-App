<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'notification_settings_text',
        'about_app', 'phone', 'email', 'fb_link', 'tw_link', 'insta_link', 'you_link',
    ];
    public $timestamps = true;

}