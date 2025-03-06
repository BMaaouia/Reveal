<?PHP
	

	class reponse{
		private ?int $idr = null;
		private ?string  $reponseR=null;
        private ?string  $reponse=null;
		private ?string  $mail=null;
        




		
		function __construct( string  $reponseR,string $reponse){
			
            $this->reponseR=$reponseR;
			$this->reponse=$reponse;
			
		
		}
		
		function getIdr(){
			return $this->idr;
		}
		
		function getReponseR(){
			return $this-> reponseR;
		}
        function getReponse(){
			return $this-> reponse;
		}

		function getMail(){
			return $this-> mail;
		}
		
		function setId(string $idr): void{
			$this->idr=$idr;
		}
		
		
    function setReponseR( string $reponseR):void
    {
        $this-> reponseR= $reponseR;
    }
    function setReponse( string $reponse):void
    {
        $this-> reponse = $reponse;
    }

	function setMail( string $mail):void
    {
        $this-> mail = $mail;
    }
	
		
	}


?>

	
	

	
	

