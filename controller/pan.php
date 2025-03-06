<?php
include_once '../config.php';
require_once "../model/panier.php";
class panierC{
	function ajouterPanier($panier){
		$sql="INSERT INTO panier(nom,prix,id_article) VALUES (:nom,:prix,:article)";
	$db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
					'nom' => $panier->getnom(),
                    'prix'=>$panier->getprix(),
                    'article'=>$panier->getid_article(),
                  
                   
                ]);
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
	}
	function afficherPanier(){
		$sql="SELECT *FROM panier";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}
	function supprimerPanier($id_panier){
		$sql="DELETE  from panier where  id_panier=:id_panier ";
		
		$db = config::getConnexion();
		try{
			
		$req=$db->prepare($sql);
			$req->bindValue(':id_panier',$id_panier);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
		}
	}
		function modifierPanier($panier,$id_panier){
				try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE panier SET 
					    nom=:nom,
					    prix=:prix,
					    id_article=:id_article,
						qte=:qte,
				
					WHERE id_panier = :id_panier'
				);
				$query->execute([
					'id_panier' => $id_panier,
					 'nom' => $panier->getnom(),
					 'prix' => $panier->getprix(),
					 'id_article' => $panier->getid_article(),
					 'qte' => $panier->getqte(),

					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}

		}
		function rechercherPanier($id_panier){
			$sql="SELECT * from panier where id_panier=$id_panier";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reserv=$query->fetch();
				return $reserv;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function sumsale(){
			$db = config::getConnexion();
				
				
			$sql = "SELECT COUNT(id_panier)  FROM panier;";
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
	
}