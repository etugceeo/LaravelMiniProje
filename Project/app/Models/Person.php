<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Person extends Model
{
    //
    protected $table= "person";
    //protected $guarded=[];
    protected $fillable = array('name', 'surname', 'email','title','company_id','phone');
    public $timestamps = false;

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
