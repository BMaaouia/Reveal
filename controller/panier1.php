<?php
include_once '../config.php';
require_once "../model/pan.php";
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
		function modifierpanier1($pan,$idpan){
				try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE pan SET 
					    
					    somme=:somme
					   
				
					WHERE idpan = :idpan'
				);
				$query->execute([
					'idpan' => $idpan,
					 'somme' => $pan->getsomme()


					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}

		}
		function rechercherpanier1($id_panier1){
			$sql="SELECT * from panier1 where id_panier1=$id_panier1";
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
	

		function recupererPanier($idpan){
			$sql="SELECT * from pan where idpan=$idpan";
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

		public function recherchecomm($search_value)
		{
			$sql=" SELECT * FROM pan where idpan like '$search_value' ";
	
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


	
		function tricomm($tri) {
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'SELECT * FROM pan'
				);
				if (isset($tri))
				{if ($tri=="a")
				{$query = $db->prepare(
					'SELECT * FROM pan ORDER BY idpan ASC'
				);}
	
					if ($tri=="b")
					{$query = $db->prepare(
						'SELECT * FROM pan ORDER BY somme ASC '
					);}
				  
					if ($tri=="c")
					{$query = $db->prepare(
						'SELECT * FROM pan ORDER BY lastname ASC '
					);}
					
				}
	
				$query->execute();
				return $query->fetchAll();
			} catch (PDOException $e) {
				$e->getMessage();
			}
	
		}


		public function pagination($page, $perPage)
		{
			$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
			$sql = "SELECT * FROM pan LIMIT {$start},{$perPage}";
			$db = config::getConnexion();
			try {
				$liste = $db->prepare($sql);
				$liste->execute();
				$liste = $liste->fetchAll(PDO::FETCH_ASSOC);
				return $liste;
			} catch (Exception $e) {
				die('Erreur: ' . $e->getMessage());
			}
		}
		
		
		public function calcTotalRows($perPage)
		{
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM pan";
			$db = config::getConnexion();
			try {
		
				$liste = $db->query($sql);
				$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
				$pages = ceil($total / $perPage);
				return $pages;
			} catch (Exception $e) {
				die('Erreur: ' . $e->getMessage());
			}
		}
		


		function sumsale(){
			$db = config::getConnexion();
				
				
			$sql = "SELECT COUNT(idpan)  FROM pan;";
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