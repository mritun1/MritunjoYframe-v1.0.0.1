<?php 
function StartAPI($className, $req, $query){
    if($_SERVER['REQUEST_METHOD']=='GET'){
        if($req){
            if($req == 's1'){
                //Search 1
                echo $className::searchData_1($query);
            }else if($req == 's2'){
                //Search 2
                echo $className::searchData_2($query);
            }else if($req == 'pag'){
                //-------------------------------------------------------------------
                //  TO GET ALL THE LISTS OF DATA USING - PAGINATION
                //-------------------------------------------------------------------
                //Example: https://example.com/api/blogs/pag/ASC/6/7
                //https://example.com/api/blogs/pag/sort/limit/offset
                $request = $_SERVER['REQUEST_URI'];
                $exp_req = explode('/' , $request);
                echo $className::getAllData('pag',$exp_req[4],$exp_req[5],$exp_req[6]);
            }else if($req == 'total'){
                //-------------------------------------------------------------------
                //  TO GET TOTAL NUMBER OF DATA
                //-------------------------------------------------------------------
                //Example: https://example.com/api/blogs/total
                echo $className::getAllData('total','','','');
            }else{
                //If have id
                echo $className::getDataUsingId($req);
            }
        }else{
            //-------------------------------------------------------------------
            //  TO GET ALL THE LISTS OF DATA ONLY
            //-------------------------------------------------------------------
            //Read all the lists of data
            //Example: https://example.com/api/blogs
            echo $className::getAllData('all','','','');
        }
    }else{
        if(isset($_POST['purpose'])){
            
            if($_POST['purpose'] == 'access'){
                //EXECUTE FUNCTION FOR INSERT
                echo $className::Access();
            }else{
                if($_POST['purpose'] == 'Insert'){
                    //EXECUTE FUNCTION FOR INSERT
                    echo $className::insertData();
                }else
                if($_POST['purpose'] == 'Update'){
                    //EXECUTE FUNCTION FOR INSERT
                    $id = $_POST['id'];
                    echo $className::UpdateData($id);
                }else
                if($_POST['purpose'] == 'Delete'){
                    //EXECUTE FUNCTION FOR INSERT
                    $id = $_POST['id'];
                    echo $className::DeleteData($id);
                }else{
                    echo "Error: required_data_not_send";
                }
            }
        }
    }
}
?>