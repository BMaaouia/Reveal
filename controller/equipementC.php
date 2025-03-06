<?PHP
	include_once "../config.php";
	require_once '../model/equipement.php';

	class equipementC {
		
		function ajouterequipement($Utilisateur){
			$sql="INSERT INTO produit (idproduit, nomproduit, imgproduit, typeproduit, price) 
			VALUES (:idproduit, :nomproduit, :imgproduit, :typeproduit, :price)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'idproduit' => $Utilisateur->getidproduit(),
					'nomproduit' => $Utilisateur->getnomproduit(),
					'imgproduit' => $Utilisateur->getimgproduit(),
					'typeproduit' => $Utilisateur->gettypeproduit(),
					'price' => $Utilisateur->getprice(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherequipements(){
			
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerequipement($idproduit){
			$sql="DELETE FROM produit WHERE idproduit = :idproduit ";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindParam(":idproduit", $idproduit);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierequipement($Utilisateur, $idproduit){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
						nomproduit = :nomproduit, 
						imgproduit = :imgproduit,
						typeproduit = :typeproduit,
						price = :price
		

					WHERE idproduit = :idproduit'
				);
				$query->execute([
					'nomproduit' => $Utilisateur->getnomproduit(),
					'imgproduit' => $Utilisateur->getimgproduit(),
					'typeproduit' => $Utilisateur->gettypeproduit(),
					'price' => $Utilisateur->getprice(),

					'idproduit' => $idproduit
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererequipement($idproduit){
			$sql="SELECT * from produit where idproduit=$idproduit";
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

		function recupererequipement1($idproduit){
			$sql="SELECT * from Utilisateur where idproduit=$idproduit";
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
		
	


	public function rechercheequipement($search_value)
	{
		$sql=" SELECT * FROM produit where idproduit like '$search_value' ";

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



	
	function triequipement($tri) {
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'SELECT * FROM produit'
			);
			if (isset($tri))
			{if ($tri=="a")
			{$query = $db->prepare(
				'SELECT * FROM produit ORDER BY id ASC'
			);}

				if ($tri=="b")
				{$query = $db->prepare(
					'SELECT * FROM produit ORDER BY nomproduit ASC '
				);}
			  
				if ($tri=="c")
				{$query = $db->prepare(
					'SELECT * FROM produit ORDER BY typeproduit ASC '
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
		$sql = "SELECT * FROM produit LIMIT {$start},{$perPage}";
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
		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM produit";
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











	}
?>