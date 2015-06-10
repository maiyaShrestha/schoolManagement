<?php namespace app\Http\Controllers;


use app\Permission;
use app\Roles_permission;
use app\User;
use app\Role;


class WelcomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $roles=Role::all();
        $permissions=Permission ::all();
        $roleArray=array();
        $permissionArray=array();
      $rolePermissionArray=array();
       foreach($roles as $key =>$value){
       $roleArray[$key]=$value;

      }

        foreach($permissions as $key =>$value){
            $permissionArray[$key]=$value;
        }
        foreach($roles as $role){
            $roleId=$role->id;
            foreach($permissions as $permission){
                $permissionId=$permission->id;
                array_push($rolePermissionArray,$roleId.':'.$permissionId);

            }
        }
        $rolePermissionIds=Roles_permission::all();

        $flagArray=array();
       foreach($rolePermissionIds as $rolePermissionId){
            $var =$rolePermissionId->role_id.':'.$rolePermissionId->permission_id;

           $flag= in_array($var,$rolePermissionArray);

            if($flag==1){
                array_push($flagArray,$var);
            }

        }
        return view('role_permission_matrix',compact('roleArray','permissionArray','flagArray'));
    }

    public function insertRolePermission(){


      $rolePermissionArray = $_POST['value'];

        $permission_matrix = array();
        for ($i = 0; $i < count($rolePermissionArray); $i ++) {
            $firstArray = explode(':', $rolePermissionArray[$i]);

            array_push($permission_matrix, $firstArray);
        }

        /* sorts the array based on the first column: role */
        array_multisort($permission_matrix);
        $role_col = array_column($permission_matrix, 0);
        $per_col = array_column($permission_matrix, 1);
        $action = array_column($permission_matrix, 2);

        $permissions_role_array_meta_data = array_count_values($role_col);
        $j = 0;
        foreach ($permissions_role_array_meta_data as $key => $value) {
            $role= Role::find($key);
            if(isset($role)){
                $permissions = $role->permissions;

                for ($i = 0; $i < $permissions_role_array_meta_data[$key]; $i ++, $j ++) {
                    $permission=Permission::find($per_col[$j]);

                    if (($action[$j] === "n") && (! $permissions->contains($permission)))
                    {

                        $role->permissions()->save($permission);
                         }
                    elseif ($action[$j] === "d" && $permissions->contains($permission)) {

                        $role->permissions()->detach($permission);
                    }
                }

            }
        }



    }
}

