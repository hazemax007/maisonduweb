<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'job' , 'company' , 'email' , 'address' , 'phone'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
