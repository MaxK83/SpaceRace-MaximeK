<?php
	
	namespace App;
	require_once __DIR__ . '/vendor/autoload.php';
	include_once './src/Participent.php';
	include_once './src/Resultat.php';
	include_once './src/course.php';

	use App\src\Participent;
	use App\src\Resultat;
	use App\src\Course;

	$course = new Course();
	$participent = new Participent($course);
	$resultat = new Resultat($course);

	// Afficher la grille de départ triée
	$participent->afficherParticipants();
	echo "<br>";
	// Afficher le résultat de la course
	$resultat->afficherResultats();


	//creation fichier auteur
	$nom ="kohler"; $prenom ="maxime";
	$auteur = fopen("author.txt", "w");
	fputs($auteur, "$nom $prenom\n");
	fclose($auteur);
?>