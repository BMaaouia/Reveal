<?php
include_once '../config.php';
class EventCore {

    function getEvents()
    {
        $sql="SELECT * FROM event";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste->fetchAll(PDO::FETCH_OBJ);
            
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }


    function addEvent($titre,$description,$date,$lieu,$image,$type)
    {
        $sql="INSERT INTO event values (null,:titre,:description,:date,:lieu,:image,:type)";
		$db = config::getConnexion();
		try{
		
        $req=$db->prepare($sql);
		$req->bindValue(':titre',$titre);
        $req->bindValue(':description',$description);
        $req->bindValue(':date',$date);
        $req->bindValue(':lieu',$lieu);
        $req->bindValue(':image',$image);
        $req->bindValue(':type',$type);

		$req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherevent(){
			
        $sql="SELECT event.*, te.type FROM event join typeevent te on te.id = event.id_type";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	

        $sql="SELECT * FROM typeevent";
        $db = config::getConnexion();
        try{
            $types = $db->query($sql);
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	

        return ['liste' => $liste, 'types' => $types];
    }

function supprimerevent($id){
    $sql="DELETE FROM event WHERE id=:id";
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
    $sql="SELECT * from event where id=$id";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $event=$query->fetch();
        return $event;
    }
    catch (Exception $e){
        die('Erreur: '. $e->getMessage());
    }
}

function modifierevent($event, $id){
    try {
        $db=config::getConnexion();
        $query=$db->prepare(
            "UPDATE event SET titre=:titre,description=:description,date=:date,lieu=:lieu where id=:id;"
        );
        $query->execute([
        
            'id'=>$event->getId(),
            'titre'=>$event->getTitre(),
            'description'=>$event->getDescription(),
            'date'=>$event->getDate(),
            'lieu'=>$event->getLieu()
        ]);
        echo $query->rowCount();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


function tri($tri) {
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'SELECT event.*, te.type FROM event join typeevent te on te.id = event.id_type'
        );
        if (isset($tri))
        {if ($tri=="a")
        {$query = $db->prepare(
            'SELECT * FROM event ORDER BY id ASC'
        );}

            if ($tri=="b")
            {$query = $db->prepare(
                'SELECT * FROM event ORDER BY titre ASC '
            );}
          
            if ($tri=="c")
            {$query = $db->prepare(
                'SELECT * FROM event ORDER BY date ASC '
            );}
            
        }

        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        $e->getMessage();
    }

}
function upload_profile($path, $file){
    $targetDir = $path;
    $default = "beard.png";

    // get the filename
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    If(!empty($filename)){
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if(in_array($fileType, $allowType)){
            // upload file to the server
            if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }
    }

    // return default image
    return $path . $default;
}
function sumevents(){
    $db = config::getConnexion();
        
        
    $sql = "SELECT COUNT(id)  FROM event;";
    try{
        $query=$db->prepare($sql);
        $query->execute();
        $result=$query->fetch();
        //$result=$db->query("SELECT * FROM adherent");hédhy résumé l 3 lignes li kbal
        return $result;
        
        
        }
          
    
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
        
    }
}


public function rechercheevent($search_value)
	{
		$sql=" SELECT * FROM event where id like '$search_value' ";

		//global $db;
		$db =Config::getConnexion();

		try{
			$result=$db->query($sql);

			return $result;

		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}



}

?>