<?PHP
	

	class locationtab{
		private ?int $numlocation = null;
        private ?string $start =null;
		private ?string $end =null;
		private ?string $title =null ;
		private ?string $descrp= null;





		
		function __construct(string $start,string $end,string $title,string $descrp){
			

            $this->start=$start;
			$this->end=$end;
			$this->title=$title;
			$this->descrp=$descrp;
			
            

		}
		
		function getnumlocation(){
			return $this->numlocation;
		}
		function getstart(){
			return $this->start;
		}
		function getend(){
			return $this->end;
		}
		function gettitle(){
			return $this->title;
		}
		function getdescrp(){
			return $this->descrp;
		}
		
		function setnumlocation(int $numlocation): void{
			$this->numlocation=$numlocation;
		}
		
		function setstart(string $start): void{
			$this->type=$start;
		}
		function setend(string $end): void{
			$this->type=$end;
		}
		function settitle(string $title): void{
			$this->title=$title;
		}
		
		 function setdescrp($descrp): void
		{
			$this->descrp= $descrp;
		}
			
	}


?>

	
	

	
	

