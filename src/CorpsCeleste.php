<?php

	namespace App\src;
	
	//classe parent
	class CorpsCeleste {
		protected float $masse;
		protected int $diametre;
		protected int $demiGrandAxe;
		protected float $vitesse;
		protected string $nom;

		public function __construct($nom, $masse, $diametre, $demiGrandAxe, $vitesse){
			$this->masse = $masse;
			$this->diametre = $diametre;
			$this->demiGrandAxe = $demiGrandAxe;
			$this->vitesse = $vitesse;
			$this->nom = $nom;
		}

	}
?>