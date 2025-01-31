<?php

	namespace App\src;
	include_once 'Planete.php';
	include_once 'Comete.php';
	include_once 'Asteroid.php';
	include_once 'PlaneteNaine.php';
	class Factory
	{
		static function RandomAstre() { //genere un astre aleatoire	
			$nom = Name();
			$masse = rand(0, 100) / 100;  
			$diametre = rand(1, 100000); //km
			$demiGrandAxe = rand(1, 1000)*1000000; //millions de km
			$vitesse = rand(10, 100)*1000; // millier km/h
			$astre = ['Planete', 'Asteroide', 'Comete', 'PlaneteNaine'][array_rand(['Planete', 'Asteroide', 'Comete', 'PlaneteNaine'])];

			$className = "App\\src\\$astre";  

			// genere un astre aleatoire
			switch ($astre) {
				case 'Planete':
				case 'PlaneteNaine':
					$subType = ['liquide', 'solide', 'gazeux'][array_rand(['liquide', 'solide', 'gazeux'])];
					return new $className($nom, $masse, $diametre, $demiGrandAxe, $vitesse, $subType);
				default:
					return new $className($nom, $masse, $diametre, $demiGrandAxe, $vitesse);
			}
		}

	}

	function Name() {
		$result = '';
    
        for ($i = 0; $i < 8; $i++) {
            $result .= chr(rand(97, 122)); // recupere un caracter aleatoire de la table ASCII [a-z]
        }
    
        return $result; // Renvoie la chaîne générée
	}


?>