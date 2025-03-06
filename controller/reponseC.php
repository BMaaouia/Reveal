<?PHP
	include_once "../config.php";
	require_once '../model/reponse.php';
	

	class reponseC {
		
		function ajouterReponse($Utilisateur){
			$sql="INSERT INTO reponse ( reponseR,reponse) 
			VALUES ( :reponseR, :reponse )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					
					'reponseR' => $Utilisateur->getReponseR(),
					'reponse' => $Utilisateur->getReponse(),
					
				
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

	
		
		function afficherReponseF(){
			//SELECT id_client, nom, prenom, ville FROM ville INNER JOIN email ON ville.id_client = email.id_client
			$sql="SELECT * FROM reponse INNER JOIN reclamation ON reponse.idr=reclamation.id ";
	//	$sql="SELECT * FROM reponse ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

        function afficherReponseB(){
			
			$sql="SELECT * FROM reponse ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		

		

	

		function supprimerReponse($id){
			$sql="DELETE FROM reponse WHERE idr= :idr";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idr',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierReponse($Utilisateur, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reponse SET 
						
						reponseR= :reponseR,
						reponse=:reponse
					WHERE idr = :idr'
				);
				$query->execute([
				
					'reponseR' => $Utilisateur->getReponseR(),
					'reponse' => $Utilisateur->getReponse(),
					'idr' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererReponse($id){
			$sql="SELECT * from reponse where idr=$id";
		
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererReclamation1($id){
			$sql="SELECT * from reclamation where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


		public function recherchereponse($searchR)
        {
            $sql=" SELECT * FROM reponse where idr like '$searchR' ";
    
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


		function trireponse($tri) {
            try {
				$db = config::getConnexion();
                $query = $db->prepare(
                    'SELECT * FROM reponse'
                );
                if (isset($tri))
                {if ($tri=="a")
                {$query = $db->prepare(
                    'SELECT * FROM reponse ORDER BY idr DESC'
                );}

                    if ($tri=="b")
                    {$query = $db->prepare(
                        'SELECT * FROM reponse ORDER BY reponse ASC '
                    );}
                  
                    if ($tri=="c")
                    {$query = $db->prepare(
                        'SELECT * FROM reponse ORDER BY reponse DESC '
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