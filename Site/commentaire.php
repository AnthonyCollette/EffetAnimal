<!DOCTYPE html>

<html>

<head>
	<link rel="effet animal" href="http://effetanimal.fr">
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="Anthony Collette">
	<meta name="copyright" content="Effet Animal">
	<meta name="keywords" content="">
	<title>Effet Animal</title>
	<link rel="icon" type="image/png" href="images/favicon.png">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
	<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="menu.js"></script>

</head>

<body>
<nav class="navbar navbar-expand navbar-dark bg-info2">
        <div class="container-fluid">
        <a class="navbar-brand pb-2" href="index.html"><img src="images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav align-self-end" id="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">ACCUEIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mediation.html">MEDIATION ANIMALE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="seances.html">SEANCES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="avecqui.html">AVEC QUI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pourqui.html">POUR QUI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prevention.html">PREVENTION MORSURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link actif" href="livre.php">LIVRE D'OR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://effetanimalmediation.blogspot.com">ACTU</a>
                </li>
             
                <li class="nav-item dropdown d-none">
                    <a class="nav-link dropdown-toggl" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="navbar-toggler-icon"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right bg-info2" aria-labelledby="navbarDropdownMenu">
                    </ul>
                </li>
            </ul>
        </div>
        </div>
	</nav>

	<div class="contact-clean">
		<h3 class="text-center">Poster un commentaire</h3><br><br>
		<form method="post" action="commentaire.php" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.1); background-color: #ffffff;">
			<input type="hidden" name="action" value="poster-commentaire" />
			<input type="text" name="email" class="hidden" />

			<div class="form-group"><textarea class="form-group" name="commentaire" placeholder="Votre commentaire"
					rows="14" required></textarea></div>
			<div class="form-group"><input class="form-control" type="text" name="nom" placeholder="Votre Nom"
					required /></div>
			<div class="form-group"><input class="form-control is-valied" type="email" name="emailtrue"
					placeholder="Votre email" required /></div>

			<div class="form-group text-center"><input type="submit" class="btn btn-primary"
					value="Poster mon commentaire" /></div>
			<div class="clear"></div>
			<p class="red right">Votre adresse e-mail n'est pas publiée lorsque vous ajoutez un commentaire.
				<div class="clear"></div>
		</form>
		<div>
			<script>
			<?php if(!empty($message_text)){ echo "alert('".$message_text."');"; } ?>
			</script>


			<?php
	$bdd = new PDO('mysql:host=anthonyczt888.mysql.db;dbname=anthonyczt888;charset=utf8','anthonyczt888', 'MARILYNmanson8');
	$currenturl = strtolower('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


	function commentaires($url, $id_commentaire=0)
	{
		global $bdd;
	
		$i=0;
		$commentaires = '';
		$tcolor = ['blue','green','orange','purple','gray','red'];
		
		$sql = "SELECT id_commentaire, nom, commentaire, email, date FROM espace_commentaires WHERE actif='y' AND url=".$bdd->quote($url);
		if($id_commentaire!=0){ $sql .= " AND id_sous_commentaire=".$id_commentaire; }else{ $sql .= " AND id_sous_commentaire=0"; }
		$sql .= " ORDER BY id_sous_commentaire, date";
		
		foreach($bdd->query($sql) as $data) {
			$i++;
			mt_srand(crc32($data['email']));
			
			$commentaires .= '<div class="box-light">';
				
				if($i==1 && $id_commentaire==0)
				{
					$sql2 = "SELECT COUNT(id_commentaire) FROM espace_commentaires WHERE actif='y' AND url=".$bdd->quote($url);
					$query = $bdd->prepare($sql2); 
					$query->execute(); 
					$row = $query->fetch();
					$count = $row[0];
					$nb = $count;
					$s='s';
					
					if($count==1){ $nb = 'Un'; }
					
					$commentaires .= '<h2>'.$nb.' commentaire'.$s.'</h2>';
				}
				
				$commentaires .= '<div class="separator"></div>
									<div class="box-light">
										<div class="letter '.$tcolor[mt_rand(0, count($tcolor) - 1)].'">'.htmlentities(substr($data['nom'], 0, 1)).'</div>
										<p class="chapeau">@'.htmlentities($data['nom']).' <span class="gray">'.$data['date'].'</span></p>
										<p>'.htmlentities($data['commentaire']).'</p>
										<form method="post" action="commentaire.php">
											<input name="action" value="poster-commentaire" type="hidden">
											<input name="email" class="hidden" type="text">
											<input name="id_sous_commentaire" value="'.$data['id_commentaire'].'" type="hidden">
											<div id="comform-div-'.$data['id_commentaire'].'" class="comform-div hidden">
												<p>Réponse à @'.htmlentities($data['nom']).'<br><textarea name="commentaire" required></textarea></p>
												<p>Nom<br><input name="nom" type="text" required></p>
												<p>Adresse e-mail<br><input name="emailtrue" type="email" required></p>
											</div>
											<div class="clear"></div>
											<p><input type="submit" class="repondre button-blue" data-rel="'.$data['id_commentaire'].'" value="Répondre" /></p></p>
											<div class="clear"></div>
										</form>
									</div>';
				
				$commentaires .= commentaires($url, $data['id_commentaire']);
				
			$commentaires .= '</div>';
		}
		
		return $commentaires;
	}

	if(isset($_POST['action']) && $_POST['action']=='poster-commentaire')
	{

		if(isset($_POST['email']) && empty($_POST['email']))
		{
			if(isset($_POST['commentaire']) && !empty($_POST['commentaire']) &&	isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['emailtrue']) && !empty($_POST['emailtrue']))
			{
				$id_sous_commentaire = 0;
				$_SESSION['COMMENTAIRE_ART_CONTRIB']=$_POST['commentaire'];
				$_SESSION['NOM_ART_CONTRIB']=$_POST['nom'];
				$_SESSION['EMAIL_ART_CONTRIB']=$_POST['emailtrue'];

				if(isset($_POST['id_sous_commentaire']) && is_numeric($_POST['id_sous_commentaire'])){ $id_sous_commentaire = intval($_POST['id_sous_commentaire']); }
			
				if(filter_var($_POST['emailtrue'], FILTER_VALIDATE_EMAIL))
				{
					$sql = "INSERT INTO espace_commentaires(
						id_sous_commentaire,
						nom,
						commentaire,
						email,
						url,
						actif,
						date
					) VALUES(
						".$id_sous_commentaire.",
						:nom,
						:commentaire,
						:emailtrue,
						:currenturl,
						'y',
						'".date("Y-m-d H:i:s")."'
					)";
					$query = $bdd->prepare($sql);
					$query->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
					$query->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);
					$query->bindValue(':emailtrue', $_POST['emailtrue'], PDO::PARAM_STR);
					$query->bindValue(':currenturl', $currenturl, PDO::PARAM_STR);
					$query->execute();
					unset($_POST);
					
					$message_text = 'Votre message a été déposé mais vous devez attendre qu\'il soit validé.';
					$message_img = 'check';
				}
				else
				{
					$message_text = 'Votre adresse e-mail n\'est pas valide !';
				}
			}
			else
			{
				$message_text = 'Les informations obligatoires ne sont pas toutes renseignées !';
			}
		}
	}

	$commentaires = commentaires($currenturl, 0);
    if(!empty($commentaires)){ echo '<div class="box-light">'.$commentaires.'</div>'; }
  
?>

			<script>
					$(document).ready(function () {
						$('.repondre').click(function () {
							console.log('clicked....');
							var id = $(this).attr('data-rel');
							if ($('#comform-div-' + id).hasClass('hidden')) {
								$(this).removeClass('button-blue')
									.css('float', 'left').addClass('button-blue');

								$('.comform-div').addClass('hidden');
								$('#comform-div-' + id).find('p').show()
									.parent('#comform-div-' + id).removeClass('hidden');
							}
						});
					});
			</script>
			<div class="offset-md-3 col-md-8 wow fadeIn" style="margin-top: 4%; animation-delay: 0.3s; max-width: 50%;">
                        <img src="images/chonlivre.png" class="img-fluid" style="margin-bottom: 140px;"/>
                    </div>
		<footer class="sticky-footer">
        <div class="container text-center bas">© Textes & images de Jennifer Poli <br />
            © Site par <a href="http://www.anthonycollette.fr">Anthony Collette</a><br />
            <a href="mentions.html">Mentions légales</a></div>
    </footer>
</body>

</html>