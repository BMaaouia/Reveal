<?PHP
	include_once "../config.php";
	require_once '../model/reclamation.php';
	require_once '../model/reponse.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require 'C:/xampp/htdocs/integ3/views/PHPMailer-master/PHPMailer-master/src/Exception.php';
	require 'C:/xampp/htdocs/integ3/views/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
	require 'C:/xampp/htdocs/integ3/views/PHPMailer-master/PHPMailer-master/src/SMTP.php';
  
	class ReclamationC {
		
		function ajouterReclamation($Utilisateur){
			$sql="INSERT INTO reclamation (date, name, lastname, email, sujet,message) 
			VALUES (:date, :name, :lastname, :email, :sujet, :message)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'date' => $Utilisateur->getDate(),
					'name' => $Utilisateur->getName(),
					'lastname' => $Utilisateur->getLastname(),
					'email' => $Utilisateur->getEmail(),
					'sujet' => $Utilisateur->getSujet(),
					'message' => $Utilisateur->getMessage()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherReclamations(){
			
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function afficherReclamations2(){
			$sql="SELECT * FROM reclamation INNER JOIN reponse ON reclamation.id=reponse.idr ";
			//$sql="SELECT * FROM reclamation  ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
       
	   public function afficherReponse3($id=null) {
            try {
                $pdo =config::getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reclamation where idr=:id '
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

       
        

		function supprimerreclamation($id){
			$sql="DELETE FROM reclamation WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierreclamation($Utilisateur, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
						date = :date, 
						name = :name,
						lastname = :lastname,
						email = :email,
						sujet = :sujet,
						message=:message
					WHERE id = :id'
				);
				$query->execute([
					'date' => $Utilisateur->getDate(),
					'name' => $Utilisateur->getName(),
					'lastname' => $Utilisateur->getLastname(),
					'email' => $Utilisateur->getEmail(),
					'sujet' => $Utilisateur->getSujet(),
					'message' => $Utilisateur->getMessage(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererReclamation($id){
			$sql="SELECT * from reclamation where id=$id";
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


		function sendmail($rec){
			$mail = new PHPMailer; 
			$name=$rec->getName();
			$lastname=$rec->getLastname();
			$email=$rec->getemail();
			$date=$rec->getDate();
			$sujet=$rec->getSujet();
			$message=$rec->getMessage();
			
		 
		$mail->isSMTP();                      // Set mailer to use SMTP 
		$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
		$mail->SMTPAuth = true;               // Enable SMTP authentication 
		$mail->Username = 'ghofranesoltani29@gmail.com';   // SMTP username 
		$mail->Password = 'azerty2018';   // SMTP password 
		$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
		$mail->Port = 587;                    // TCP port to connect to 
		 
		// Sender info 
		$mail->setFrom('ghofranesoltani29@gmail.com', 'Innovators'); 
		$mail->addReplyTo('ghofranesoltani29@gmail.com', 'Innovators'); 
		 
		// Add a recipient 
		$mail->addAddress($rec->getemail()); 
		 
		//$mail->addCC('cc@example.com'); 
		//$mail->addBCC('bcc@example.com'); 
		 
		// Set email format to HTML 
		$mail->isHTML(true); 
		 
		// Mail subject 
		$mail->Subject = 'Repport'; 
		 
		// Mail body content 
		$bodyContent = '<html><body>';
		$bodyContent .= '<h1 style="color:#171716;">Reclamation : </h1>'; 
		$bodyContent .= '<h4 style="color:#BCAFA8;">Nom : </h4> '; 
		$bodyContent .=   $name ; 
		$bodyContent .= '<h4 style="color:#BCAFA8;">Prenom : </h4> '; 
		$bodyContent .=   $lastname ; 
		$bodyContent .= '<h4 style="color:#BCAFA8;">email : </h4> '; 
		$bodyContent .=   $email ; 
		$bodyContent .= '<h4 style="color:#BCAFA8;">Date : </h4> '; 
		$bodyContent .=   $date ; 
		$bodyContent .= '<h4 style="color:#BCAFA8;">Sujet : </h4> '; 
		$bodyContent .=   $sujet ;
		$bodyContent .= '<h4 style="color:#BCAFA8;">Message: </h4> '; 
		$bodyContent .=   $message ;
		$bodyContent .= '<html><body>';
		$mail->Body    = $bodyContent; 
		 
		// Send email 
		if(!$mail->send()) { 
			echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
		} else { 
			echo 'Message has been sent.'; 
		} 
			 }


			
	

//	public function sendmail($reclamation)
	//	{
	//		$headers = "From: allani.aziz01@gmail.com\r\n";
	//		$to = $reclamation->getEmail();
	//		$subject = "confirmation de reclamation";
	//		$message = "Bonjour Mr/Mme : " . $reclamation->getEmail() . "<br> je vous confirme qu'on a bien reçu votre reclamation pour le " . $reclamation->getDater() . " de titre " . $reclamation->getSujet() . " <br> . Merci pour votre coopération";
//if (mail($to, $subject, $message, $headers))
	//			echo 'Success!';
	//		else
	//			echo 'UNSUCCESSFUL...';
	
	//	}
       
	public function recherchereclamation($search_value)
	{
		$sql=" SELECT * FROM reclamation where id like '$search_value' ";

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



	
	function trireclamation($tri) {
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'SELECT * FROM reclamation'
			);
			if (isset($tri))
			{if ($tri=="a")
			{$query = $db->prepare(
				'SELECT * FROM reclamation ORDER BY date ASC'
			);}

				if ($tri=="b")
				{$query = $db->prepare(
					'SELECT * FROM reclamation ORDER BY name ASC '
				);}
			  
				if ($tri=="c")
				{$query = $db->prepare(
					'SELECT * FROM reclamation ORDER BY lastname ASC '
				);}
				
			}

			$query->execute();
			return $query->fetchAll();
		} catch (PDOException $e) {
			$e->getMessage();
		}

	}
 

function sumrec(){
    $db = config::getConnexion();
        
        
    $sql = "SELECT COUNT(id)  FROM reclamation;";
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

public function pagination($page, $perPage)
{
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
	$sql = "SELECT * FROM reclamation LIMIT {$start},{$perPage}";
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
	$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM reclamation";
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



	
