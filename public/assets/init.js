var arr=new Array();
function getCheckBoxValue(cb){
    var checked = cb.checked;

    var ind;

    if (checked) {
        val = cb.value + ":d";
    }


    else {
        val = cb.value + ":n";

    }
    ind = arr.indexOf(val);

    //console.log("ind:" + ind);
    if (ind == -1 && checked == true) {
        arr.push(cb.value + ":n");
    }
    else if (ind == -1 && checked == false) {
        arr.push(cb.value + ":d");
    }

    else {
        if (checked == false) {

            arr[ind] = cb.value + ":d";
        } else {

            arr[ind] = cb.value + ":n";
        }
    }
    //console.log(arr);

}
function rolesPermissions() {

    $.ajax({
        type : "post",
        data : {
            value : arr
        },
        url : "insertRolePermission",
        success : function(response) {
            $("#response1").html(response);
        }

    });

}

function cancelPermissionMatrix(){
    $.ajax({
        type : "post",
        data : {
            value : arr
        },
        url : "insertRolePermission",
        success : function(response) {
            $("#response1").html(response);
        }

    });
}