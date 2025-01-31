<?php
	namespace App\src;

	class Resultat {
		private $course;
		private $time;
	
		public function __construct(Course $course) {
			$this->course = $course;
			$this->time = $this->course->getJours() * 8760; // Calculer le temps en heures
		}

		/**
		 * Affiche les résultats de la course
		 * 
		 * La méthode trie les participants par le nombre de tours d'orbite
		 * et affiche les résultats pour les trois premiers
		 */
		public function afficherResultats() {
			
			$participants = $this->course->getParticipants();
			// Trier les participants par le nombre de tours d'orbite
			usort($participants, function($a, $b) {
				return $this->course->nbTour($this->time, $b->getDemiGrandAxe(), $b->getVitesse()) - $this->course->nbTour($this->time, $a->getDemiGrandAxe(), $a->getVitesse());  // Tri décroissant
			});

			// Affichage du résultat pour le vainqueur (1er)
			$this->afficherResultatIndividuel($participants[0], "vainqueur");

			// Affichage du résultat pour le second (2ème)
			$this->afficherResultatIndividuel($participants[1], "lauréat de la médaille d'argent");

			// Affichage du résultat pour le troisième (3ème)
			$this->afficherResultatIndividuel($participants[2], "troisième candidat présent sur le podium");
		}

		/**
		 * Affiche le résultat pour un participant
		 * 
		 * @param Participant $participant Le participant
		 * @param string $position La position du participant (vainqueur, lauréat de la médaille d'argent, troisième candidat présent sur le podium)
		 */
		private function afficherResultatIndividuel($participant, $position) {
			$className = basename(str_replace('\\', '/', get_class($participant)));  // Nom de la classe sans le namespace
			$type = $participant->getType();
			$nom = $participant->getName();
			$tours = $this->course->nbTour($this->time, $participant->getDemiGrandAxe(), $participant->getVitesse());

			if ($className === 'Asteroide') { //definit le genre de la phrase
				echo "Le $position de la course est un $className de type $type, le grand $nom, il a effectué $tours tours d'orbite.<br>";
			} else {
				echo "Le $position de la course est une $className de type $type, le grand $nom, il a effectué $tours tours d'orbite.<br>";
			}
		}

	}