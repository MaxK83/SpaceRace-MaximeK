<?php
	namespace App\src;
	include_once 'CorpsCeleste.php';
	use App\src\CorpsCeleste;

	class Comete extends CorpsCeleste{
		protected $type = "solide";
		
		/**
		 * Constructeur de la classe Asteroide
		 * 
		 * @param string $nom         	Le nom de la comete
		 * @param float  $masse       	La masse de la comete
		 * @param float  $diametre   	Le diam tre de la comete
		 * @param float  $demiGrandAxe 	Le demi grand axe de la comete
		 * @param float  $vitesse     	La vitesse de la comete
		 */
		public function __construct($nom, $masse, $diametre, $demiGrandAxe, $vitesse) {
			parent::__construct($nom , $masse, $diametre, $demiGrandAxe, $vitesse);
		}

		// fonction pour recuperer les parametres de la classe
		public function getName(): string {
			return $this->nom;
		}
	
		public function getVitesse(): float {
			return $this->vitesse;
		}

		public function getMasse(): string {
			return $this->masse;
		}
	
		public function getVDiametre(): float {
			return $this->diametre;
		}

		public function getDemiGrandAxe(): float {
			return $this->demiGrandAxe;
		}

		public function getType(): string {
			return $this->type;
		}
	}
?>

