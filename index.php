<?php session_start(); ?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Qui Paire Gagne</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link rel="stylesheet" href="./css/reset.css">
	    <link rel="stylesheet" href="./css/styles.css<?php echo "?".rand();?>">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script type="text/javascript" src="./js/scripts.js<?php echo "?".rand();?>"></script>
	</head>
	<body>
		<?php include('notifs.php'); ?>
		<section>
			<header>
				<div class="banner">
					<h1>Qui Paire Gagne</h1>
					<p>Générateur de listes aléatoires pour vos parties.</p>
					<div class="actions">
						<a href="nouvelle-liste.php" class="button">Créer une liste</a>
						<a href="#" class="button open-modal" data-modal="rejoindre-partie">Rejoindre une liste</a>
					</div>
				</div>
			</header>
			<div class="body">
				<?php $listeCartes  =  simplexml_load_file('listes.xml'); ?>
				<?php $i = 0; ?>
    			<?php foreach ($listeCartes as $valeur): ?>
	    			<?php $nom = $valeur['nom']; ?>
	    			<?php if ($nom == $_GET['nomListe']): ?>
		    			<h2>Liste <strong><?php echo $nom; ?></strong></h2>
		    			<p>Partagez ce code ou <a href="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" class="copy_button">l'<abbr>URL</abbr> de la page</a> avec les autres joueurs&nbsp;!</p>
						<div class="grid">
							<?php $n = 1; ?>
							<?php foreach ($valeur->carte as $valeur): ?>				
							<a href="./img/<?php echo $valeur['id']; ?>.jpg" class="open-lightbox">
							<figure>
								<img src="./img/<?php echo $valeur['id']; ?>.jpg" alt="">
								<figcaption><?php echo $n; ?></figcaption>
							</figure>
							</a>
							<?php $n++; ?>
							<?php endforeach; ?>
						</div>
						<?php $i++; ?>
						<?php break; ?>
					<?php endif; ?>
				<?php endforeach; ?>

				<?php if ($i == 0): ?>
					<p class="bigger"><strong>Aucune liste en cours.</strong></p> 
					<p>Créez en une nouvelle ou rejoignez une liste existante.</p>
				<?php endif; ?>
			</div>
			<?php include('rejoindre-partie.php'); ?>
		</div>

		<script>
			$('.copy_button').on( 'click', function(e){
		        e.preventDefault();
		        copyToClipboard( $(this).attr('href') );
		        alert("L'adresse a bien été copiée");
		    });

		    function copyToClipboard(element) {
		        var $temp = $("<input>");
		        $("body").append($temp);
		        $temp.val(element).select();
		        document.execCommand("copy");
		        $temp.remove();
		    }
		</script>
	</body>
</html>