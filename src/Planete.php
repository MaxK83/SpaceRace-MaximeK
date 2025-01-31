<?php
	namespace App\src;
	include_once 'CorpsCeleste.php';
	use App\src\CorpsCeleste;

	class Planete extends CorpsCeleste{
		protected $type;
		
		/**
		 * Constructeur de la classe PlaneteNaine
		 * 
		 * @param string $nom         	Le nom de la planete
		 * @param float  $masse       	La masse de la planete
		 * @param float  $diametre    	Le diam tre de la planete
		 * @param float  $demiGrandAxe 	Le demi grand axe de la planete
		 * @param float  $vitesse     	La vitesse de la planete
		 * @param string $type        	Le type de la planete (liquide, solide, gazeux)
		 */
		public function __construct( $nom, $masse, $diametre, $demiGrandAxe, $vitesse, $type) {
			parent::__construct($nom, $masse, $diametre, $demiGrandAxe, $vitesse);
			$this->type = $type;
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

