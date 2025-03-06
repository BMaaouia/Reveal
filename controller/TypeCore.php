<?php
include_once '../config.php';
class TypeCore {

    function getTypes()
    {
        $sql="SELECT * FROM typeevent";
        $db = config::getConnexion();
        $all_categories = mysqli_query($db,$sql);
   
        // The following code checks if the submit button is clicked 
        // and inserts the data in the database accordingly
        if(isset($_POST['submit']))
        try{
            $liste=$db->query($sql);
            return $liste->fetchAll(PDO::FETCH_OBJ);
            
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }


    function addtype($type,$contenu)
    {
        $sql="INSERT INTO typeevent values (null,:type,:contenu)";
		$db = config::getConnexion();
		try{
		
        $req=$db->prepare($sql);
		$req->bindValue(':type',$type);
        $req->bindValue(':contenu',$contenu);

		$req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function affichertype(){
			
        $sql="SELECT * FROM typeevent";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

        $sql="SELECT * FROM event";
        $db = config::getConnexion();
        try{
            $events = $db->query($sql);
            
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        
        return ["liste" => $liste, "events" => $events];
    }

function supprimertype($id){
    $sql="DELETE FROM typeevent WHERE id=:id";
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

function recuperer($id){
    $sql="SELECT * from typeevent where id=$id";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $type=$query->fetch();
        return $type;
    }
    catch (Exception $e){
        die('Erreur: '. $e->getMessage());
    }
}

function modifiertype($type, $id){
    try {
        $db=config::getConnexion();
        $query=$db->prepare(
            "UPDATE typeevent SET type=:type,contenu=:contenu where id=:id;"
        );
        $query->execute([
        
            'id'=>$type->getid(),
            'type'=>$type->gettype(),
            'contenu'=>$type->getcontenu()

        ]);
        echo $query->rowCount();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


}


?>