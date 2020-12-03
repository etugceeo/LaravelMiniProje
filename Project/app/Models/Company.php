<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected  $table= "company";
    // protected $guarded=[];
    protected $fillable = array('company_name', 'website', 'web_html');
    public $timestamps = false;
    public function people()
    {
        return $this->hasMany(Person::class);
    }
    public  function addresses()
    {
        return $this->hasMany(Address::class);
    }


}
