<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'active', 'company_id', 'image'];
    // set default values for this model
    protected $attributes = [
        'active' => 1
    ];

    public function scopeActive($request){
        return $request->where('active', '1')->orderBy('name', 'asc')->get();
    }
    public function scopeInactive($request){
        return $request->where('active', '0')->orderBy('name', 'asc')->get();
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function getActiveAttribute($attribute){
        return $this->activeOptions() [$attribute];
    }
    public function activeOptions(){
        return  [
            0 => "Inactive",
            1 => "Active",
            2 => 'In-Progress'
        ];
    }
}
