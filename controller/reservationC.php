<?PHP
	include_once "../config.php";
	require_once '../model/reservation.php';

	class reservationC {
		
		function ajouterreservation($Utilisateur){
			$sql="INSERT INTO reservation( idproduitres, nomproduitres, imgproduitres, iddate , id_event, titre_event) 
			VALUES ( :idproduitres, :nomproduitres, :imgproduitres, :iddate, :id_event, :titre_event)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'idproduitres' => $Utilisateur->getidproduitres(),
					'nomproduitres' => $Utilisateur->getnomproduitres(),
					'imgproduitres' => $Utilisateur->getimgproduitres(),
					'iddate' => $Utilisateur->getiddate(),
					'id_event' => $Utilisateur->getid_event(),
					'titre_event' => $Utilisateur->gettitre_event()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherreservations(){
			
			$sql="SELECT * FROM reservation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerreservation($numres){
			$sql="DELETE FROM reservation WHERE numres = :numres ";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindParam(":numres", $numres);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		
		function modifierreservation($Utilisateur, $idproduitres){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reservation SET 
						idproduitres = :idproduitres, 
						nomproduitres = :nomproduitres,
						imgproduitres = :imgproduitres,
						iddate = :iddate
		

					WHERE idproduitres = :idproduitres'
				);
				$query->execute([
					'idproduitres' => $Utilisateur->getidproduitres(),
					'nomproduitres' => $Utilisateur->getnomproduitres(),
					'imgproduitres' => $Utilisateur->getimgproduitres(),
					'iddate' => $Utilisateur->getiddate(),

					'idproduitres' => $idproduitres
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererreservation($idproduitres){
			$sql="SELECT * from reservation where idproduitres=$idproduitres";
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

		function recupererreservation1($idproduitres){
			$sql="SELECT * from Utilisateur where idproduitres=$idproduitres";
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