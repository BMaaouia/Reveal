<?php
include './config.php';
require_once "model/pan.php";
class panier1C{
	function ajouterpanier1($panier1){
		$sql="INSERT INTO pan(somme) VALUES (:somme)";
	$db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
				
                    'somme'=>$panier1->getsomme(),
                    
                  
                   
                ]);
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
	}
	function afficherpanier1(){
		$sql="SELECT *FROM pan";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
	}
	function supprimerpanier1($idpan){
		$sql="DELETE  from pan where  idpan=:idpan";
		
		$db = config::getConnexion();
		try{
			
		$req=$db->prepare($sql);
			$req->bindValue(':idpan',$idpan);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
		}
	}
	function modifierpanier1($panier1, $idpan){
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE pan SET
				 
					somme= :somme 
					
				WHERE idpan= :idpan'
			);
			$query->execute([
				
				'somme' => $panier1->getsomme(),
				'idpan' => $idpan
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
		function recupererpanier1($idpan){
			$sql="SELECT * from pan where idpan=$idpan";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$panier1=$query->fetch();
				return $panier1;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function rechercherpanier1($id_panier1){
			$sql="SELECT * from pan where id_panier1=$id_panier1";
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
	
}