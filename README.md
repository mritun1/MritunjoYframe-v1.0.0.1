# MritunjoyFrame

1. To check Login status

```bash
<?php
if(APP_AUTH_ADMIN::authCheck() == true){ echo "LOGGED IN";}else{ echo "LOGGED OUT"; }
?>
```

2. To redirect when logged in

```bash
<?php APP_AUTH_ADMIN::authRedirect(true, 'single'); ?>
```

3. Form submit serialize example

```bash
<form id="formtest" action="/api/admin" method="post" enctype="multipart/form-data" class="form-signin" >
```

```bash
$('#formtest').submit(function(event){
    var data = new FormData(this);
    //ADD ADDITIONAL FORM HERE
    data.append('addDocsPage','Adding');
    submitForm(this,data,event,function(mgs){
        if(mgs.code == 1){
            //ADD YOUR PROGRAM HERE ON SUCCESS
            console.log(mgs);
        }
    });
});
```

4. Fetch all lists from api

```bash
APP_CRUD_CRUD::fetchAllLists('https://example.in/api/blogs',function($response){
    return '<div style="border:1px solid red;background-color:lavender;">' . html_entity_decode($response['content']) . '</div>';
});
```

5. Fetch only URL

```bash
echo APP_CRUD_CRUD::fetchURL('https://example.in/api/blogs/total');
```

6. GET THE PAGE PARAMETERS

```bash
<?php echo CONFIG::getRouteRequest(2); ?>
```

7. Fetch single content by Id

```bash
<?php
  $id = CONFIG::getRouteRequest(2);
  $getData = APP_CRUD_CRUD::fetchCont('https://example.in/api/blogs/'.$id);

  echo APP_CRUD_CRUD::content($getData,'content');
?>
```

8. Delete button

```bash
<button delid="23" type="button" class="btn btn-danger btn-sm deleteCont">Delete</button>
```

```bash
<script>
$(document).ready(function(){
  $(".deleteCont").click(function(){
    //alert($(this).attr("delid"));
    $.post("https://example.in/api/blogs",
    {
      purpose: "Delete",
      id: $(this).attr("delid")
    },
    function(data,status){
      //alert("Data: " + data + "\nStatus: " + status);
      if(status == 'success'){
        window.location.replace(window.location.href);
      }
    });
  });
});
</script>
```

After this do something on API

9. Creating Router
   <br/>
   First add this on the index.php

```bash
CONFIG::route('profile','pagecontroller@single');
```

Then go to app/controllers/pagecontrollers.php, and add this. This is to create router and fetch content form API url.

```bash
public static function single(){

    $id = CONFIG::getRouteRequest(2);
    $getData = APP_CRUD_CRUD::fetchCont('https://example.in/api/blogs/'.$id);

    $page_arr = array(
        'title' => APP_CRUD_CRUD::content($getData,'title'),
        'description' => APP_CRUD_CRUD::content($getData,'description')
    );
    CONFIG::route_set('layout.header2','blog.single','layout.footer',$page_arr);
}
```

Now, create file assets/view/blog/single.php
<br/>
Because you had written 'blog.single' on the pagecontroller.
<br/>
And get this values in all of the pages like header, footer, content.

```bash
global $page_arr;

echo $page_arr['title'];
```

10. SEND EMAIL

```bash
<script>
$(document).ready(function(){
  $('#webcontactform').submit(function(event){
    event.preventDefault();

    var data = new FormData();
    data.append('purpose','access');
    data.append('sendtoemail','yourmail@gmail.com');

    $.ajax({
      url: $(this).attr("action"),
      type: $(this).attr("method"),
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      success: function (data)
      {
        let mgs = JSON.parse(JSON.stringify(data));
        if(mgs.code == 1){
          alert(mgs.status);
        }else{
          alert(
            'Status: ' + mgs.err
          );
        }
      },
      error: function (err)
      {
        alert(err);
      }
    });
  });


});
</script>
```

```bash
echo APP_INTI_EMAIL::send_email();
```

11. To build functions - create file inside assets/functions/ folder i.e., blogs.php
    And then go to app/pagecontrollers.php, find

```bash
public static function func(){
```

And add this inside

```bash
if(CONFIG::getRouteRequest(2) == 'blogs'){

    CONFIG::include_func('blogs',function(){ self::page404(); });

}
```

To get the function link

```bash
/func/blogs
```

12. Include files that are inside /assets/view/layout/menu.php

```bash
<?php config::include('layout.menu'); ?>
```

13. CRUD - Insert & Update Data to Database

```bash
$arr = array(
    "title" => htmlentities($_POST['title']),
    "description" => htmlentities($_POST['description']),
    "content" =>  htmlentities($_POST['content'])
);

APP_CRUD_CRUD::InsertUpdateData($arr,'blogs',APP_CRUD_DB::conn(),"");
```

If you set ID and ID is not empty that it will automatically update.

```bash
"id" =>  htmlentities($_POST['id'])
```

14. CHECK IF STRONG PASSWORD

```bash
if(APP_AUTH_VALID::password($password) == true){

}else{
  $message['status'] = APP_AUTH_VALID::password($password);
}
```

15. VALIDATE NAME AND MOBILE

```bash
APP_AUTH_VALID::mobile($_POST['mobile']) == true &&
APP_AUTH_VALID::personName($_POST['first_name']) == true &&
```

16. TO CHECK IF EXISTS IN DATABASE

```bash
$data = "SELECT * FROM users WHERE email='$email' LIMIT 1";
if(APP_CRUD_DB::checkData($data) == true){

}
```

17. USER REGISTRATION
    <br/>
    Put this on your functions

```bash
//SEND REQUEST - POST
//password, password1, email, first_name, last_name
if(isset($_POST['registration']) && $_POST['registration'] == 'access'){

    echo APP_AUTH_USERS::register_users();

}
```

18. GET SINGE ROW FROM DATABASE

```bash
$where = "email='".$email."'";
echo APP_CRUD_DB::getOne('fname','users',$where);
```

19. GET ALL DATA FROM DATABASE

```bash
$data = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$getAll = json_decode(APP_CRUD_DB::getAll($data),true);
$password = $getAll[0]['row_name'];
```

20. SET COOKIES

```bash
APP_AUTH_SET::setcookie("pass",'124',"30");
```

21. CHECK IF USER - LOGIN LOGOUT

```bash
if(APP_AUTH_USERS::user_log_status() == true){
  echo "LOGGED IN";
}else{
  echo "OUT";
}
```

22. REDIRECT LOGIN WHEN LOGGED IN

```bash
<?php APP_AUTH_USERS::log_redirect("/home"); ?>
```

23. USER LOGOUT

```bash
<a href="/func/auth/?logout=success">Logout</a>
```

24. SEARCH FROM DATABASE

```bash
$columns = "fname,lname,content";
$table ="table_name";
$query = "search query";
$result = APP_CRUD_DB::searchData($columns,$table,$query);
```

25. GETTING THE POST DATA

```bash
<?php echo APP_AUTH_SET::postData('title'); ?>
```

26. GET THE LOGGED IN - USER TABLE DATA

```bash
echo APP_AUTH_USERS::logData('fname');
```

27. TO DELETE
    <br/>
    Set this attribute on the delete button

```bash
<button del-for="docs" del-id="6">delete</button>
```

Now, create /delete.php functions file

And your can write like this to execute delete

```bash
<?php
APP_CRUD_CRUD::deleteFunctions(function(){

    $for = $_POST["delete-confirm"];
    $id = $_POST["del-id"];

    if($for == 'docs'){
        if(APP_CRUD_DB::sql_query("DELETE FROM table WHERE id='$id' LIMIT 1")){
            $message['code'] = 1;
            $message['status'] = 'Deleted Success';
        }
    }

    echo json_encode($message);

});
?>
```

Add this modal to the footer

```bash
<div id="deleteModal" class="modal">
    <div class="modal-section">
        <div class="modal-xs add-docs-modal">

            <div class="modal-head">
                <button type="button" class="modal-close"><i class="fa-solid fa-xmark"></i></button>
                <p class="text-danger"><i class="fa-solid fa-trash"></i> Are you sure to delete?</p>
            </div>
            <div class="modal-content align_center">

                <span id="deleteStatus"></span>

                <button class="btn_md btn_success modal-close">Cancel</button>
                <button delete-confirm="" del-id="" class="btn_md btn_danger">Confirm</button>

            </div>
            <div class="modal-foot">

            </div>

        </div>
    </div>
</div>
```

28. SQL QUERY TO DATABASE

```bash
if(APP_CRUD_DB::sql_query("DELETE FROM docs WHERE id='$id' LIMIT 1")){
    $message['code'] = 1;
    $message['status'] = 'Deleted Success';
}
```

29. REDIRECT WHEN USERS LOG OFF

```bash
<?php APP_AUTH_USERS::log_redirect_off("/docs"); ?>
```

30. SEND AJAX REQUEST

```bash
$("a[docs-edit]").click(function (event) {
    var data = new FormData();
    //ADD ADDITIONAL FORM HERE
    data.append("editDocs", "edit");
    ajaxFunc("post", "/func/docs", data, function (mgs) {
      //ADD HERE GETTING RESPONSE
      if (mgs.code == 1) {
        //CODES HERE
      }
    });
  });
```
