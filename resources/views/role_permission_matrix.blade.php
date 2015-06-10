<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="assets/init.js"></script>
<script src="assets/jquery-1.11.2.min.js"></script>
<table>
    <tr>
        <td></td>
        @foreach($roleArray as $role)
        <td>{{$role->role_name }}</td>
        @endforeach
    </tr>
    @foreach($permissionArray as $permission)
    <?php $p=$permission->id; ?>
    <tr>
    <td>{{$permission->permission_name }}</td>
        @foreach($roleArray as $role)
    <?php $r=$role->id; ?>
        @if ($rolePermissionIds = $r.':'.$p)

        @endif
        @if (in_array($rolePermissionIds,$flagArray))
        <td><input type="checkbox" value="{!!$rolePermissionIds!!}" checked onclick="getCheckBoxValue(this)"/></td>

        @else
        <td><input type="checkbox" value="{!!$rolePermissionIds!!}" onclick="getCheckBoxValue(this)"/></td>

        @endif
        @endforeach
    </tr>
      @endforeach
    </table>

<div id="response1"></div>
<input type="button" class="btn btn-primary" value="DONE" onclick="rolesPermissions()">
<input type="button" class="btn btn-primary" value="Cancel" id="submit" onclick="cancelPermissionMatrix()"/></br></br>