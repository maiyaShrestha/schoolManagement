function getStaffDetails(){
   // $('#dtStaffDetails').datatable();
    $.ajax({
        url : '/staffDetails',
        dataType : "html",
        success : function(response) {
            $(".panel-body").html(response);
        }
    });

    $( document ).ready(function(){
        console.log("hello ");
       $('#dtStaffDetails').Datatable(
        {
         "sPaginationType" : "full_numbers",
         "sScrollY" : "200px",
         'bAutoWidth' : false,
         "sAjaxSource" : "/staffs",
         "aoColumns" : [
         {
         "sDefaultContent" : "",
         "mDataProp" : "id"
         },

         {
         "sDefaultContent" : "",
         "mDataProp" : "first_name"
         },
         {
         "sDefaultContent" : "",
         "mDataProp" : "middle_name"
         },
         {
         "sDefaultContent" : "",
         "mDataProp" : "last_name"
         },
         {
         "sDefaultContent" : "",
         "mDataProp" : "address"
         },
         {
         "sDefaultContent" : "",
         "mDataProp" : "phone"
         },
         {
         "sDefaultContent" : "",
         "mDataProp" : "mobile"
         },
         {
         "sDefaultContent" : "",
         "mDataProp" : "department"
         }
         ]
         })
    })
}
function getCheckBoxValue(cb) {

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



}
/*
('#staff').onclick(function(){
   alert("hello maiya");
})*/