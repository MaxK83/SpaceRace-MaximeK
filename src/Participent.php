<?php
	namespace App\src;	
	class Participent {
		private $course;
		private $time;
	
		public function __construct(Course $course) {
			$this->course = $course;
			$this->time = $this->course->getJours() * 8760; // Calculer le temps en heures
		}
	
		public function afficherParticipants(): void {
			$participants = $this->course->getParticipants();
	
			// Trier d'abord par la taille de l'orbite (DemiGrandAxe)
			usort($participants, function($a, $b) {
				if ($a->getDemiGrandAxe() === $b->getDemiGrandAxe()) {
					return $b->getVitesse() <=> $a->getVitesse(); // Si même orbite, trier par vitesse
				}
				elseif ($a->getVitesse() === $b->getVitesse()) {
					return $b->getName() <=> $a->getName();
				}
				return $a->getDemiGrandAxe() <=> $b->getDemiGrandAxe(); // Tri par orbite
			});
	
			// Affichage des participants triés
			foreach ($participants as $index => $participant) {
				$className = basename(str_replace('\\', '/', get_class($participant))); // Extraire le nom de la classe sans le namespace
				if ($className === 'Asteroide') {
					echo "le " . ($index + 1) . "ième participant " . $participant->getName() . 
					 " est un " . $className . " de type " . 
					 $participant->getType() . "<br>";
				} else {
					echo "le " . ($index + 1) . "ième participant " . $participant->getName() . 
					 " est une " . $className . " de type " . 
					 $participant->getType() . "<br>";
					
				}
			}
		}
	}
	