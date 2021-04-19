<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

protected $fillable = [
        'property_category','location', 'city','district','email','address_of_property','price','details','contact_no','rooms','washrooms'
    ];

}