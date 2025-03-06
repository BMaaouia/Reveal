<?php
include_once '../config.php';
require_once '../model/adherent.php';

class AdherentC{

    public function afficher() {
        $db=config::getConnexion();
        try {
            $query=$db->prepare("SELECT * FROM user");
            $query->execute();
            $result=$query->fetchAll();
            //$result=$db->query("SELECT * FROM adherent");hédhy résumé l 3 lignes li kbal
            return $result;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function supprimer($num){
        $sql="DELETE FROM user WHERE userID=:num";
        $db=config::getConnexion();
        $query=$db->prepare($sql);
        $query->bindValue(':num',$num);
        try{
            $query->execute();//Pour remplacer ligne bindValue w ligne hédhy execute(['num'=>$num]);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function detail($num){
        $sql = "SELECT * FROM user WHERE userID =$num";
        $db=config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $adherent=$query->fetch();
            return $adherent;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    public function addUser ($adherent,$profileImage){

        $pdo =config::getConnexion ();
        try{    
            $query =$pdo->prepare(
         "INSERT INTO user (firstName, lastName, email, password,image,register_date) 
        VALUES(:firstName,:lastName,:email,:password,:image,CURRENT_TIMESTAMP)");
       
       $query ->execute([
        //'NumAbon'=>$adherent->getNumAbonnement(),  auto 
        'firstName'=>$adherent->getFirstName(),
        'lastName'=>$adherent->getLastName(),
        'email'=>$adherent->getEmail(),
        'password'=>$adherent->getPassword(),
        'image'=>$profileImage
    ]);
    
    } catch (PDOException $e)
    {
     $e ->getMessage();
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

    function modifierUtilisateur($Adherent, $id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    firstName = :firstName, 
                    lastName = :lastName,
                    email = :email,
                    password = :password
                WHERE userID = :id'
            );
            $query->execute([
                'firstName' => $Adherent->getFirstName(),
                'lastName' => $Adherent->getLastName(),
                'email' => $Adherent->getEmail(),
                'password' => $Adherent->getPassword(),
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recupererclient($id){
        $sql="SELECT * from user where userID=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $ad=$query->fetch();
            return $ad;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function recupererclient1($id){
        $sql="SELECT * from user where userID=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $ad=$query->fetch(PDO::FETCH_OBJ);
            return $ad;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function connexionUser($email,$password)
		{
			$db = config::getConnexion();
			$sql = "SELECT * FROM user WHERE email='" . $email . "'and password= '". $password." ' " ;
			try
			{
				$query=$db->prepare($sql);
				$query->execute();
				$count=$query->rowCount();
				$result = $query->fetch(PDO::FETCH_OBJ);
				if($count==0)
				{
					$message="pseudo ou le mot de passe est incorrect";
				}
				else
				{
					$x=$query->fetch();
					$message=$x['email'];
					$_SESSION['nom'] = $result->firstName ;
					$_SESSION['id'] = $result->userID ;
					$_SESSION['prenom']=$result->lastName ;
					$_SESSION['email']=$result->email ;
                    $_SESSION['password']=$result->password ;
                    $_SESSION['status']=$result->status ;
                    $_SESSION['image']=$result->image ;
                    $_SESSION['date']=$result->register_date ;
					echo "$message";

				}
				

			}
			catch (Exception $e)
				{
					$message= " ".$e->getMessage();
				}

			return $message;
		}

        function send_code($email){
            $db = config::getConnexion();
			
            $code = rand(999999, 111111);
            $_SESSION["code"]=$code;
            $sql = "UPDATE user SET code = $code WHERE email = '$email'";
            try{
                $query=$db->prepare($sql);
                $query->execute();
    
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
            $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: brmaaouia@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['code'] = $code;
                   header('location: forgot_pass.php');
                }
    } 

    function verify_code($code){
        $db = config::getConnexion();
        
        
        $sql = "SELECT * FROM user  WHERE code = $code  ";
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $result=$query->fetch();
            //$result=$db->query("SELECT * FROM adherent");hédhy résumé l 3 lignes li kbal
            //return $result;
            
            if($result==true){
                
            header('location: new_pass.php');
            }
              
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            header('location: login.php');
        }
        
        //$_SESSION['email'] = $email;
    
}

function change_pass($password,$email)
{
    $db = config::getConnexion();
    $sql = "UPDATE user SET password = '$password' WHERE email = '$email'";
    try {
        $query=$db->prepare($sql);
        $query->execute();
        $count=$query->rowCount();
       
            
        if($count>0)
        {
        
            $result = $query->fetch(PDO::FETCH_OBJ);
            $x=$query->fetchAll();
            //$message=$x['email'];
            
            $_SESSION['email']=$result['email'] ;
            //echo "$message";

        }
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        die('Erreur: '.$e->getMessage());
    }
  
  
}

function ban($id)
{
    $db = config::getConnexion();
			
    
    $sql = "UPDATE user SET status = 'Banned' WHERE userID = '$id'";
    try{
        $query=$db->prepare($sql);
        $query->execute();

    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

function unban($id)
{
    $db = config::getConnexion();
			
    
    $sql = "UPDATE user SET status = ' ' WHERE userID = '$id'";
    try{
        $query=$db->prepare($sql);
        $query->execute();

    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

public function verif_ban($email)
{
    $db = config::getConnexion();
			
    
    
    try{
        $sql = "SELECT status FROM user WHERE email = '$email'";
        $query=$db->prepare($sql);
        $query->execute();
        
        $count = $query->rowCount();
        
        if ($count > 0)      
        { 
           // $status = $result;
           $result=$query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['status']=$result['status'] ;
            
        }
           /* if($result->status =='Banned'){
                header('Location: login.php');
            }*/
            //$result=$db->query("SELECT * FROM adherent");hédhy résumé l 3 lignes li kbal
           // return $result; 
            
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
    
}



public function search_4($v) {
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            
            $query ="SELECT * FROM user where firstName like '%$v%' order by firstName "
        );
        $query->execute([
            'firstName' => $v

        ]);				
        echo $query->rowCount() . " résultats trouvés <br>";
        return $query->fetchAll();

    } catch (PDOException $e) {
        $e->getMessage();
    }
}

public function search($search_value)
	{
		$sql=" SELECT * FROM user where firstName like '%$search_value%' order by firstName ASC";

		//global $db;
		$db =config::getConnexion();

		try{
			$result=$db->query($sql);

			return $result;

		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}


    function tri($tri) {
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'SELECT * FROM user'
			);
			if (isset($tri))
			{if ($tri=="a")
			{$query = $db->prepare(
				'SELECT * FROM user ORDER BY firstName ASC'
			);}

				if ($tri=="b")
				{$query = $db->prepare(
					'SELECT * FROM user ORDER BY lastName ASC '
				);}
			  
				if ($tri=="c")
				{$query = $db->prepare(
					'SELECT * FROM user ORDER BY email ASC '
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

