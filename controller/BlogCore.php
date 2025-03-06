<?php
include_once '../config.php';
class BlogCore {

    function getblogs()
    {
        $sql="SELECT * FROM blog";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste->fetchAll(PDO::FETCH_OBJ);
            
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }


    function addblog($titre,$description,$date,$lieu,$image)
    {
        $sql="INSERT INTO blog values (null,:titre,:description,:date,:lieu,:image)";
		$db = config::getConnexion();
		try{
		
        $req=$db->prepare($sql);
		$req->bindValue(':titre',$titre);
        $req->bindValue(':description',$description);
        $req->bindValue(':date',$date);
        $req->bindValue(':lieu',$lieu);
        $req->bindValue(':image',$image);

		$req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherblog(){
			
        $sql="SELECT * FROM blog";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

function supprimerblog($id){
    $sql="DELETE FROM blog WHERE id=:id";
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
    $sql="SELECT * from blog where id=$id";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $blog=$query->fetch();
        return $blog;
    }
    catch (Exception $e){
        die('Erreur: '. $e->getMessage());
    }
}

function modifierblog($blog, $id){
    try {
        $db=config::getConnexion();
        $query=$db->prepare(
            "UPDATE blog SET titre=:titre,description=:description,date=:date,lieu=:lieu where id=:id;"
        );
        $query->execute([
        
            'id'=>$blog->getId(),
            'titre'=>$blog->getTitre(),
            'description'=>$blog->getDescription(),
            'date'=>$blog->getDate(),
            'lieu'=>$blog->getLieu()
        ]);
        echo $query->rowCount();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

public function rechercheblog($search_value)
{
    $sql=" SELECT * FROM blog where id like '$search_value' ";

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

function triblog($tri) {
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'SELECT * FROM blog'
        );
        if (isset($tri))
        {if ($tri=="a")
        {$query = $db->prepare(
            'SELECT * FROM blog ORDER BY id ASC'
        );}

            if ($tri=="b")
            {$query = $db->prepare(
                'SELECT * FROM blog ORDER BY titre ASC '
            );}
          
            if ($tri=="c")
            {$query = $db->prepare(
                'SELECT * FROM blog ORDER BY lieu ASC '
            );}
            
        }

        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        $e->getMessage();
    }

}

}


?>