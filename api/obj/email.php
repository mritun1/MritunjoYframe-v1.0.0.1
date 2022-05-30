<?php 
class EMAIL{

    public static function Access(){

        //if(APP_AUTH_ADMIN::authCheck() == true){
            $content = $_POST['sendtocontent'];
            if(isset($_POST['mobile'])){
                $content = $_POST['sendtocontent'] . '<br/> Mobile: ' . $_POST['mobile'];
            }

            $array = array(
                'sendtosubject' => $_POST['sendtosubject'],
                'sendermail' => $_POST['sendermail'],
                'sendtocontent' => $content,
                'sendtoemail' => $_POST['sendtoemail']
            );

            echo APP_INTI_EMAIL::send_email($array);

        //}else{
        //    echo "Error: not_logged_in";
        //}

    }
}
?>