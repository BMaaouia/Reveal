<?PHP
	

	class equipement{
		private ?string $idproduit = null;
        private ?string $nomproduit =null;
		private ?string $imgproduit =null ;
		private ?string $typeproduit= null;
		private ?int $price = null;




		
		function __construct(string $idproduit,string $nomproduit,string $imgproduit,string $typeproduit, int $price){
			
			$this->idproduit=$idproduit;
            $this->nomproduit=$nomproduit;
			$this->imgproduit=$imgproduit;
			$this->typeproduit=$typeproduit;
            $this->price=$price;
			
            

		}
		
		function getidproduit(){
			return $this->idproduit;
		}
		function getnomproduit(){
			return $this->nomproduit;
		}
		function getimgproduit(){
			return $this->imgproduit;
		}
		function gettypeproduit(){
			return $this->typeproduit;
		}
		function getprice(){
			return $this->price;
		}
		
		function setidproduit(string $idproduit): void{
			$this->idproduit=$idproduit;
		}
		
		function setnomproduit(string $nomproduit): void{
			$this->type=$nomproduit;
		}
		function setimgproduit(string $imgproduit): void{
			$this->imgproduit=$imgproduit;
		}
		
		 function settypeproduit($typeproduit): void
		{
			$this->typeproduit= $typeproduit;
		}

		function setprice( string $price): void
		{
			$this-> price = $price;
		}
	
		
	}


?>

	
	

	
	

