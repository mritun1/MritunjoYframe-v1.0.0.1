<?php 
class PAGECONTROLLER{

    public static function home(){
        $page_arr = array(
            'title' => 'Problems and solution base.',
            'description' => 'Get all the problems along with their solutions.'
        );
        CONFIG::route_set('','home','',$page_arr);
    }
    //----------------------------------------------------------------------
    //          PAGES ROUTER - START
    //----------------------------------------------------------------------
    
    //----------------------------------------------------------------------
    //          PAGES ROUTER - END
    //----------------------------------------------------------------------

    //----------------------------------------------------------------------
    //          ADMIN PANEL ROUTER - START
    //----------------------------------------------------------------------

    //........ FOR ADMIN - LOGIN ..................................

    

    //........ FOR FUNCTIONS/ ..................................

    public static function func(){
        if(CONFIG::getRouteRequest(1) == "func"){
            global $page_exists;
            if(CONFIG::getRouteRequest(2) != ""){
                
                //LISTS YOUR FUNCTIONS/ .PHP HERE - START
                if(CONFIG::getRouteRequest(2) == 'example'){

                    //CONFIG::include_func('blogs',function(){ self::page404(); });

                }
                else{
                    self::page404();
                }
                //LISTS YOUR FUNCTIONS/ .PHP HERE - END
                
            }else{
                self::page404();
            }
            $page_exists = 1;
        }else{
            self::page404();
        }
    }

    //........ FOR 404 error Page ..................................
    public static function page404(){
        $page_arr = array(
            'title' => 'Page Not found',
            'description' => 'The description of the Page'
        );
        CONFIG::route_set('layout.header','404.404','layout.footer',$page_arr);
    }

}
?>