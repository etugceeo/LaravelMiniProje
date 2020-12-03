<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table= "person";
    //protected $guarded=[];
    protected $fillable = array('autocomplete','company_id', 'location_field', 'street_number', 'route', 'locality', 'administrative_area_level_1', 'postal_code', 'country','postal_code','country');
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
