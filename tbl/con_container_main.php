<?php



class con_container_main {
    public static function cast(&$b){return $b;}
    public $id;       
    public $description;
    public $latitute;
    public $longitude;    
    public $image;
    public $links;
    public $user_id;
    

}//end of class

class con_container_main_META extends con_container_main{
    /** @var Tbl_types[]*/
    public $_array;
    
    /** @var Tbl_base Description*/
    public $id;    
    public $description;
    public $latitute;
    public $longitude;    
    public $image;
    public $links;
    public $user_id;
    
    public function __constructor(){        
        $this->_array=[];
        
        $this->id->type= Tbl_types::$int;
        $this->_array["id"]=$this->id; 
        
        $this->description->type=  Tbl_types::$email;
        $this->_array['description']=$this->description;
    }//end of constructor

}//end of class

class con_container_main_v {

    public $description = "description";
    public $latitude = "latitude";
    public $longitude = "longitude";
    public $image = "image";
    public $links = "link";
    public $user_id = "user_id";
    
}//end of class


class con_container_mainDO {

    static function insert_POST(SqlDb $db) {

        $foo = new con_container_main_v();

        $reflect = new ReflectionClass($foo);
        $props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);

        $myArr = [];
        foreach ($props as $prop) {
            $myArr[] = $prop->getName();
        }

        foreach ($myArr as $str) {
            if (!isset($_POST[$str])) {
                $_POST[$str] = "";
            }
        }
        //foreach ($myArr as $str) {
        //    $_POST[$str] = $db->escape($_POST[$str]);
        //}
        $s = "";

        $i = 0;
        foreach ($myArr as $str) {
            if ($i == 0) {
                $s.="`$str`='" . $db->escape($_POST[$str]) . "'\n";
            } else {
                $s.=",`$str`='" . $db->escape($_POST[$str]) . "'\n";
            }
            $i++;
        }

        $sql = "insert into `container` SET \n" . $s;

        //echo "<pre>" . $sql . "</pre>";
        $r=$db->query($sql, __LINE__);
        return $r;
    }//end of method
    
    static function update(SqlDb $db){
        
        
    }//end of method   
    
    /** @return con_container_main[] */
    static function selectBy_Id(SqlDb $db){
        
        $_POST['ID']=1;
        //$_POST['ID']+=0; differen method to be secure
        $sql="select * from `container` where `ID`=".$db->escape($_POST['ID']);
        //$sql="select * from `con_container_main` where `ID`=".$_POST['ID'];
        
        
        $result=$db->query($sql,__LINE__);
        $num_rows=$db->num_rows($result);
        
        $r=[];
        for($i=0;$i<$num_rows;$i++){
            $n=$db->fetch_assoc($result);
            $ob=new con_container_main();
            $ob->id=$n['id'];
            $ob->description=$n['description'];
            $ob->latitude=$n['latitude'];
            $ob->longitde=$n['longitude'];
            $ob->image=$n['image'];
            $ob->links=$n['link'];
            $ob->user_id=$n['user_id'];
            
            
            $r[]=$ob;            
        }
        
        foreach ($r as $res){               
          echo '<pre>';   
          print_r($res);
          echo '</pre>';
        }
        
        
        
        return $r; 
        
    }//end of method
    
    static function selectBy_All(SqlDb $db){
        
    }//end of method
}//end of class