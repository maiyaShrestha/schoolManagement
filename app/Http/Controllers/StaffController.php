<?php namespace app\Http\Controllers;

use app\Http\Requests;
use app\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function index(){
    return view('staffs/staffDetails');
}
    public function getListOfStaffs(){
        echo "welcome";
    }
    public function rolePermissionMatrix(){
        echo "hello";
     /*   $array = array();
        $roles = $this->doctrine->em->getRepository('Entities\Role')->findAll();
        $this->smartytpl->assign('count', count($roles));
        $this->smartytpl->assign('role', $roles);
        $permissions = $this->doctrine->em->getRepository('Entities\Permission')->findAll();
        $this->smartytpl->assign('permission', $permissions);
        foreach ($roles as $role) {
            $permissions = $role->getPermission();
            foreach ($permissions as $key => $value) {
                $roleid = $role->getId();
                $permisionid = $value->getId();
                $id = $roleid . ":" . $permisionid;
                array_push($array, $id);
            }
        }

        $this->smartytpl->assign('value', $array);
        $this->smartytpl->display(APPPATH . 'modules/user_access_control/views/permission_matrix.tpl');*/
    }
    /*
     * function insertRolePermission()

    {
        $rolePermissionArray = $this->input->post('value');

        $permission_matrix = array();
        for ($i = 0; $i < count($rolePermissionArray); $i ++) {
            $firstArray = explode(':', $rolePermissionArray[$i]);

            array_push($permission_matrix, $firstArray);
        }

        /* sorts the array based on the first column: role
array_multisort($permission_matrix);
$role_col = array_column($permission_matrix, 0);
$per_col = array_column($permission_matrix, 1);
$action = array_column($permission_matrix, 2);

$permissions_role_array_meta_data = array_count_values($role_col);
$j = 0;
foreach ($permissions_role_array_meta_data as $key => $value) {
$role = new Entities\Role();

$role = $this->doctrine->em->getRepository('Entities\Role')->findOneBy(array(
'id' => $key
));
if(isset($role)){
$permissions = $role->getPermission();

for ($i = 0; $i < $permissions_role_array_meta_data[$key]; $i ++, $j ++) {
$permission = $this->doctrine->em->getRepository('Entities\Permission')->findOneBy(array(
'id' => $per_col[$j]
));

if (($action[$j] === "n") && (! $permissions->contains($permission))) {
$role->addPermission($permission);
} elseif ($action[$j] === "d" && $permissions->contains($permission)) {

    $role->getPermission()->removeElement($permission);
}
                }

            }
        }

        $this->doctrine->em->flush();
        $this->smartytpl->assign('success','Permission Matrix Edited');
        $this->permissionMatrix();


    }
     */
}
