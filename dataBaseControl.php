<?php
namespace App\Util;
use App\Util\User;
use PhpParser\Node\Stmt\TryCatch;
use \PDO;

class DatabaseControl
{
private $host="localhost";
private $dbName="project";
private $userName="root";
private $password="";

   
  public function connectDataBase(): PDO
  {
      try {
          $connect = new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->userName,$this->password);
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
      return $connect;
  }
  public function closeDataBase($conn){
      $conn=null;
  }
public function dataSelection(){

    $sql="SELECT * FROM User";
   return $sql;
}

    public function dataBaseConnection()
    {
      $conn=$this->connectDataBase();

        if (!$conn) {

            return 0;

        } else {
            return 1;

        }
        $this->closeDataBase($conn);

    }
    public function insertData(){
        $conn=$this->connectDataBase();

        $sql = " INSERT INTO User(user_tc, user_password) VALUES ('789456123012','nhjnf.852')";
        $insert=$conn->prepare($sql);
        if ($insert->execute()) {

            return 0;
        }

        $this->closeDataBase($conn);
    }
    public function updateData(){

        $conn=$this->connectDataBase();
        $sql="update User set   user_password='melisa.123456' where user_id=1";

        $update=$conn->prepare($sql);
       if($update->execute()){
           //record updated
           return 0;
       }
       else{
           return 1;
       }
        $this->closeDataBase($conn);

    }
    public function checkData(){
      $conn=$this->connectDataBase();
      $select=$this->dataSelection();
      $stmt=$conn->prepare($select);
      $stmt->execute();
        $result=$stmt->rowCount();
        if($result>0){
            return 1;
        }
        $this->closeDataBase($conn);
    }
    public function selectData($secilen)
    {
        $conn = $this->connectDataBase();
        $data = $this->dataSelection();
        $statement = $conn->query($data);
while($row=$statement->fetch(PDO::FETCH_ASSOC)){
    $array[]=$row;
}
        foreach($array as $arr){
            $tc[]=$arr['user_tc'];

        }
        foreach($array as $arr1){
            $password[]=$arr1['user_password'];
        }
        $s=new User();
        $m=rand(0,count($tc)-1);
        $s->setPassword($password[1]);
        $s->setTc($tc[1]);
        if($secilen=="tc"){
            return  $s->length($tc[1]);
        }
        else{
            return  $s->length($password[1]);
        }

        $this->closeDataBase($this->connectDataBase());

