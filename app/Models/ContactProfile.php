<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ContactProfile extends Model
{
   protected $fillable = ['name', 'email', 'phone_number', 'address'];
}
