<?php namespace app;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions(){
        return $this->belongsToMany('app\Permission','roles_permissions');
    }

}
