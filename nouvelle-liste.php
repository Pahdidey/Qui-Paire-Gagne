<?php
	session_start();

	$listeCartes  =  simplexml_load_file('listes.xml');

	$file = 'listes.xml';
    $xml = simplexml_load_file($file);
    $xml->Users;

	$chaine = 'abcdefghijklmnopqrstuvwxyz';
    $chaine .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$chaine .= '1234567890'; 
	$code = ''; 

	for ($i=0; $i < 5; $i++) { 
		$code .= substr($chaine,rand()%(strlen($chaine)),1); 
	}

	$nouvellePartie = $xml->addChild('partie');
    $nouvellePartie->addAttribute('nom', $code);

  	$max = 252;
  	$liste = array();

	$i = 1;
	while ($i <= 44) {
		$nbAuHasard = mt_rand(1, $max);
		if(!in_array($nbAuHasard, $liste)) {
			$liste[] = $nbAuHasard;
            $i++;
        }
	}


	// Manche 1

    $nouvelleManche = $nouvellePartie->addChild('manche');
    $nouvelleManche->addAttribute('id', 1);

    $liste1 = array_slice($liste, 0, 11);

    foreach ($liste1 as $value) {
		$nouvelleCarte = $nouvelleManche->addChild('carte');
		$nouvelleCarte->addAttribute('id', $value);
	}

	// Manche 2

	$nouvelleManche = $nouvellePartie->addChild('manche');
    $nouvelleManche->addAttribute('id', 2);

    $liste2 = array_slice($liste, 11, 11);

    foreach ($liste2 as $value) {
		$nouvelleCarte = $nouvelleManche->addChild('carte');
		$nouvelleCarte->addAttribute('id', $value);
	}

	// Manche 3

	$nouvelleManche = $nouvellePartie->addChild('manche');
    $nouvelleManche->addAttribute('id', 3);

    $liste3 = array_slice($liste, 22, 11);

    foreach ($liste3 as $value) {
		$nouvelleCarte = $nouvelleManche->addChild('carte');
		$nouvelleCarte->addAttribute('id', $value);
	}

	// Manche 4

	$nouvelleManche = $nouvellePartie->addChild('manche');
    $nouvelleManche->addAttribute('id', 4);

    $liste4 = array_slice($liste, 33, 11);

    foreach ($liste4 as $value) {
		$nouvelleCarte = $nouvelleManche->addChild('carte');
		$nouvelleCarte->addAttribute('id', $value);
	}

    

	$dom = dom_import_simplexml($xml)->ownerDocument;
	$dom->formatOutput = true;
	$dom->preserveWhiteSpace = false;
	$dom->loadXML( $dom->saveXML());
	$dom->save($file);

	$_SESSION["partie"] = "nouvelle";
	$_SESSION["nomListe"] = $code;

	header("Location: index.php?nomListe={$code}");

?>