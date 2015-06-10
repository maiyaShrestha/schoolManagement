<?php namespace app;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public function roles(){
        $this->belongsToMany('Role');
    }
}
