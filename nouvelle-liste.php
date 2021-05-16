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

	$nouvelleListe = $xml->addChild('liste');
    $nouvelleListe->addAttribute('nom', $code);

  	$max = 252;
  	$liste = array();

	$i = 1;
	while ($i <= 11) {
		$nbAuHasard = mt_rand(1, $max);
		if(!in_array($nbAuHasard, $liste)) {
			$liste[] = $nbAuHasard;
            $nouvelleCarte = $nouvelleListe->addChild('carte');
    		$nouvelleCarte->addAttribute('id', $nbAuHasard);
            $i++;
        }
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