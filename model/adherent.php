<?PHP
	class Adherent{
		private  ?int $userID=null;
		private  ?string $firstName=null ;
		private ?string $lastName=null ;
		private  ?string $email=null ;
		private ?string $password=null ;
		private ?int $code=null;
		private ?string $status=null;
		private $image=null;
		private ?date $register_date=null;

	/*	function __construct(string $firstName, string $lastName, string $email,  string $password ,string $registerDate,string $profileImage){
			
			$this->firstName=$firstName;
			$this->lastName=$lastName;
			$this->email=$email;
			
			$this->password=$password;
			$this->registerDate=$registerDate;
			$this->profileImage=$profileImage;
		}
*/
		function __construct( string $firstName, string $lastName, string $email,  string $password ){
		
			$this->firstName=$firstName;
			$this->lastName=$lastName;
			$this->email=$email;
			
			$this->password=$password;
			
		}

	

		
		function getUserID(): int{
			return $this->userID;
		}
		function getFirstName(): string{
			return $this->firstName;
		}
		function getLastName(): string{
			return $this->lastName;
		}
		
		function getEmail(): string{
			return $this->email;
		}
		function getPassword(): string{
			return $this->password;
		}

		function getCode(): int{
			return $this->code;
		}
		
		function getStatus(): string{
			return $this->status;
		}

		function getImage(){
			return $this->image;
		}
		

		function getRegister_date(): date{
			return $this->register_date;
		}

		function setFirstName(string $firstName): void{
			$this->firstName=$firstName;
		}
		function setLastName(string $lastName): void{
			$this->lastName=$lastName;
		}
		
		function setEmail(string $email): void{
			$this->email=$email;
		}
		
		function setCode(int $code): void{
			$this->code=$code;
		}
		function setStatus(string $status): void{
			$this->status=$status;
		}

		function setImage(string $image): void{
			$this->image=$image;
		}

		function setRegister_date(date $register_date): void{
			$this->register_date=$register_date;
		}

	}
?>