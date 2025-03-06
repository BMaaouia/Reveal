<?php
include_once '../config.php';
require_once '../model/loginn.php';

class loginC{


    public function add ($login){

        $pdo =config::getConnexion ();
        try{    
            $query =$pdo->prepare(
         "INSERT INTO login (userID,firstName, lastName, email, password,image,register_date) 
        VALUES(:userID,:firstName,:lastName,:email,:password,:image,:register_date)");
       
       $query ->execute([
        'userID'=>$login->getUserID(),   
        'firstName'=>$login->getFirstName(),
        'lastName'=>$login->getLastName(),
        'email'=>$login->getEmail(),
        'password'=>$login->getPassword(),
        'image'=>$login->getImage(),
        'register_date'=>$login->getRegister_date()
    ]);
    
    } catch (PDOException $e)
    {
     $e ->getMessage();
    }
    }

    public function supprimer(){
        $sql="DELETE FROM login ";
        $db=config::getConnexion();
        $query=$db->prepare($sql);
        
        try{
            $query->execute();//Pour remplacer ligne bindValue w ligne hédhy execute(['num'=>$num]);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function ban($id)
    {
        $db = config::getConnexion();
                
        
        $sql = "UPDATE login SET status = 'Banned' WHERE userID = '$id'";
        try{
            $query=$db->prepare($sql);
            $query->execute();
    
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

function recupererlogin(){
    $sql="SELECT * from login";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $l=$query->fetch();
        return $l;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

function unban($id)
{
    $db = config::getConnexion();
			
    
    $sql = "UPDATE login SET status = ' ' WHERE userID = '$id'";
    try{
        $query=$db->prepare($sql);
        $query->execute();

    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}


function modifierLogin($l){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE login SET 
                firstName = :firstName, 
                lastName = :lastName,
                email = :email,
                password = :password
            '
        );
        $query->execute([
            'firstName' => $l->getFirstName(),
            'lastName' => $l->getLastName(),
            'email' => $l->getEmail(),
            'password' => $l->getPassword()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}





}



?>