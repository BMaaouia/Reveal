<?php
include '../DB/Config.php';
class RatingCore {

    function getRating()
    {
        $sql="SELECT * FROM rating";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste->fetchAll(PDO::FETCH_OBJ);
            
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }


    function addrating($note)
    {
        $sql="INSERT INTO rating values (null,:note)";
		$db = config::getConnexion();
		try{
		
        $req=$db->prepare($sql);
		$req->bindValue(':note',$note);
       

		$req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherrating(){
			
        $sql="SELECT * FROM rating";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

function supprimerrating($id){
    $sql="DELETE FROM rating WHERE id=:id";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id', $id);
    try{
        $req->execute();
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMeesage());
    }
}

function recupererrating($id){
    $sql="SELECT * from rating where id=$id";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $rating=$query->fetch();
        return $rating;
    }
    catch (Exception $e){
        die('Erreur: '. $e->getMessage());
    }
}

function modifierrating($note, $id){
    try {
        $db=config::getConnexion();
        $query=$db->prepare(
            "UPDATE rating SET note=:note where id=:id;"
        );
        $query->execute([
        
            'id'=>$rating->getid(),
            'note'=>$rating->getnpte(),
        

        ]);
        echo $query->rowCount();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


}


?>