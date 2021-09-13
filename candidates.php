<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class candidates extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'birthday',
        'interest',
        'strong',
        'why',
        'whyLeft',
        'salary',
        'filenames',
        'codigoR',
        'area_id',
        'experiencia_id ',
        'state_id',
        'nivel_id'
        
    ];
 
    public function setFilenamesAttribute ($value)
{
    $this->attributes['filenames'] = json_encode($value);
}
    
    public function area(){

        return $this->belongsTo('App\Models\area','area_id','id');
    }
    public function experiencia(){

        return $this->belongsTo('App\Models\experiencia','experiencia_id','id');
    }
    
    public function state(){

        return $this->belongsTo('App\Models\state','state_id','id');
    }
    
    public function lingua(){

        return $this->belongsTo('App\Models\lingua','lingua_id','id');
    }
    
    public function nivel(){

        return $this->belongsTo('App\Models\nivel','nivel_id','id');
    }
}
