<?PHP
	

	class reservation{
		private ?string $idproduitres = null;
        private ?string $nomproduitres =null;
		private ?string $imgproduitres =null;
		private ?string $iddate= null;
		private ?int $id_event= null;
		private ?string $titre_event =null;





		
		function __construct( string $idproduitres, string $nomproduitres, string $imgproduitres, string $iddate, int $id_event,string $titre_event){
			
			$this->idproduitres=$idproduitres;
            $this->nomproduitres=$nomproduitres;
			$this->imgproduitres=$imgproduitres;
			$this->iddate=$iddate;
			$this->id_event=$id_event;
			$this->titre_event=$titre_event;
			
            

		}
		function getidproduitres(){
			return $this->idproduitres;
		}
		function getnomproduitres(){
			return $this->nomproduitres;
		}
		function getimgproduitres(){
			return $this->imgproduitres;
		}
		function getiddate(){
			return $this->iddate;
		}
		function getid_event(){
			return $this->id_event;
		}
		function gettitre_event(){
			return $this->titre_event;
		}
		
		function setidproduitres(string $idproduitres): void{
			$this->idproduitres=$idproduitres;
		}
		function setnomproduitres(string $nomproduitres): void{
			$this->type=$nomproduitres;
		}
		function setimgproduitres(string $imgproduitres): void{
			$this->type=$imgproduitres;
		}
		 function setiddate(string $iddate): void
		{
			$this->iddate= $iddate;
		}
		function setid_event(int $id_event): void
		{
			$this->id_event= $id_event;
		}
		function settitre_event(string $titre_event): void
		{
			$this->titre_event= $titre_event;
		}
			
	}


?>

	
	

	
	

