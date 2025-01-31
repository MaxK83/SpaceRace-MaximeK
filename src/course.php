<?php

	namespace App\src;
	include_once __DIR__ . '/Factory.php';
	include_once __DIR__ . '/Planete.php';
	include_once __DIR__ . '/Comete.php';
	include_once __DIR__ . '/PlaneteNaine.php';
	include_once __DIR__ . '/Asteroid.php';
	
	use App\src\Factory as Factory;
	
	class Course {
		private array $participants = [];
		private $jours;
		
		public function __construct() {
			$this->jours = random_int(1, 1000); //en heures
			for ($i = 0; $i < 8; $i++) {
				$this->participants[] = Factory::RandomAstre();
			}
		}
		
		public function afficherParticipants(): void {
			$jours = $this->jours;
			$duree = $this->jours * 8760; // convertir en jours
			foreach ($this->participants as $participant) {
				echo "Nom: " . $participant->getName() . "Type: " . $participant->getType() . ", Nombre de tours: " . $this->nbTour($duree, $participant->getDemiGrandAxe(), $participant->getVitesse() ) . "tours en $jours jours<br>";
			}
		}

		/**
		 * Calcul de l'avancement d'un astre sur son orbite
		 * 
		 * @param float $time        Le temps
		 * @param float $rayon       Le rayon de l'orbite
		 * @param float $vitesse     La vitesse de l'astre
		 * 
		 * @return float L'avancement
		 */
		function Avancement($time, $rayon, $vitesse) {
			$distance = 0;
			$distanceRevolution = $rayon*2*pi();

			$distance += $vitesse * $time;
			$distance /= $distanceRevolution;
			return $distance; // Arrondi à 2 décimales le pourcentage de revolution
		}

		function nbTour($time, $rayon, $vitesse) {
			$avancer = $this->Avancement($time, $rayon, $vitesse)* 100; //change en l'avancer en pourcentage
			return (int) $avancer; // change le pourcentage en tour entier
		} 

		// Cette méthode retourne la liste des participants
		public function getParticipants(): array {
			return $this->participants;
		}

		// Cette méthode retourne la liste des participants
		public function getJours() {
			return $this->jours;
		}

	}
	
	//$course = new Course();
	//$course->afficherParticipants();

?>