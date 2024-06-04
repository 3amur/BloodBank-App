<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Token extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'token', 'type'];
    public function clients(){
        $this->belongsTo(Client::class);
    }
}
