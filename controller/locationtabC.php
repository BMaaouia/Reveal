<?PHP
	include_once "../config.php";
	require_once '../model/locationtab.php';

	class locationtabC {
		
		function ajouterlocationtab($Utilisateur){
			$sql="INSERT INTO locationtab(title,start,end,descrp) 
			VALUES (:title, :start , :end , :descrp)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'title' => $Utilisateur->gettitle(),
					'start' => $Utilisateur->getstart(),
					'end' => $Utilisateur->getend(),
					
					'descrp' => $Utilisateur->getdescrp()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherlocationtabs(){
			
			$sql="SELECT * FROM locationtab";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerlocationtab($numlocation){
			$sql="DELETE FROM locationtab WHERE numlocation = :numlocation ";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindParam(":numlocation", $numlocation);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierlocationtab($Utilisateur, $numlocation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE locationtab SET 
						start = :start, 
						title = :title,
						descrp = :descrp,
						price = :price
		

					WHERE numlocation = :numlocation'
				);
				$query->execute([
					'start' => $Utilisateur->getstart(),
					'title' => $Utilisateur->gettitle(),
					'descrp' => $Utilisateur->getdescrp(),
					'price' => $Utilisateur->getprice(),

					'numlocation' => $numlocation
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererlocationtab($numlocation){
			$sql="SELECT * from locationtab where numlocation=$numlocation";
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

		function recupererlocationtab1($numlocation){
			$sql="SELECT * from Utilisateur where numlocation=$numlocation";
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
		
	}

?>