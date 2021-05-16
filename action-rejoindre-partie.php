<?php
	session_start();
	
	$code = $_POST['code-liste'];

	if (!empty($_POST)) {
		$listeCartes  =  simplexml_load_file('listes.xml');
		$i = 0;
		foreach ($listeCartes as $valeur) {
			$nom = $valeur['nom'];
			if ($nom == $code) {
				echo "Youpi";
				$i++;
				$_SESSION["partie"] = "rejointe";
				$_SESSION["nomListe"] = $code;
				header("Location: index.php?nomListe={$code}");
			}
		}
		if ($i == 0) {
			echo "Pas youpi";
			$_SESSION["partie"] = "inconnue";
			$_SESSION["nomListe"] = $code;
			header("Location: index.php");
		}
	}
?>