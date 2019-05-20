<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $guarded =array('id');
    
    public static $rules = array(
        
        'neme'=>'required',
        'gender'=>'required',
        'hobby'=>'required',
        'inroduction'=>'required',
        );
}
