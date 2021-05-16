<?php
    if ($_SESSION['partie'] != "") {
    	if ($_SESSION['partie'] == "nouvelle") {
	        echo "<div id='toast' class='success'>La partie {$_SESSION['nomListe']} a bien été créée.</div>";
	    } elseif ($_SESSION['partie'] == "inconnue") {
	        echo "<div id='toast' class='error'>La partie {$_SESSION['nomListe']} n'existe pas.</div>";
	    } elseif ($_SESSION['partie'] == "rejointe") {
	        echo "<div id='toast' class='success'>Vous avez rejoint la partie {$_SESSION['nomListe']}.</div>";
	    }
        unset($_SESSION['partie']);
    }
?>
