<?php
include "Classconnect.php";

class runData extends Classconnect {
    
   

    public function insertData($lotterid,$gameid,$bettime,$betdate,$draw_period,$draw_number,$betstatus,$userbet,$uid,$odd){

        $sql = "INSERT INTO bet (lotterid,gameid,bettime,betdate,draw_period,draw_number,betstatus,userbet,uid,odd)VALUES(?,?,?,?,?,?,?,?,?,?)";
          $stmt = $this->dbconnect()->prepare($sql);
          $stmt->bindValue(1,$lotterid,PDO::PARAM_INT);
          $stmt->bindValue(2,$gameid,PDO::PARAM_INT);
          $stmt->bindValue(3,$bettime);
          $stmt->bindValue(4,$betdate);
          $stmt->bindValue(5,$draw_period);
          $stmt->bindValue(6,$draw_number);
          $stmt->bindValue(7,$betstatus);
          $stmt->bindValue(8,$userbet);
          $stmt->bindValue(9,$uid,PDO::PARAM_INT);
          $stmt->bindValue(10,$odd);
          if($stmt->execute()){
              echo "1 row affected";
               
          }else{
              echo $stmt->errorInfo();
          }
          
      
       }

    //checking win or lost on te bet table
    public function selectBet($drawPeriod,$drawNumber){
        $win ="win"; 
        $lost ="lost";
        $sql = "SELECT beid,userbet FROM bet WHERE draw_period = :draw_period";
        $statement = $this->dbconnect()->prepare($sql);
        $statement->bindValue(":draw_period",$drawPeriod);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $drawNumber = array_unique(explode(',', $drawNumber[0]));
        foreach($data as $row){

         $uid = $row["beid"];
         $array = array_unique(explode(',', $row['userbet']));
         if($drawNumber == $array){
         self::updateState($uid,$win);
         echo "win";
         }else{
         self::updateState($uid,$lost);
         echo "lost";
         }
         
        }
     
    }

    public function updateState($uid,$state){
        
        try {

        $sql = "UPDATE bet SET betstatus = :betstatus WHERE beid = :beid";
        $statement = $this->dbconnect()->prepare($sql);
        $statement->bindValue(":betstatus",$state);
        $statement->bindValue(":beid",$uid);
        $statement->execute();
        
        } catch (\Throwable $error) {
            //throw $th;
            echo $error->getMessage();
        }

    }
}


// $obeject = new runData;
// $obeject->selectBet('20230540001',"1,3,4,5,6");