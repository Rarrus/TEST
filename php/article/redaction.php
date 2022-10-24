<?php
	$bdd = new PDO("mysql:host=127.0.0.1;dbname=users;charset=utf8", "root", "");
	if(isset($_POST['article_titre'], $_POST['article_contenu'], $_POST['article_img'],$_POST['article_resume'])) {
	   if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
	      
	      $article_titre = htmlspecialchars($_POST['article_titre']);
	      $article_contenu = htmlspecialchars($_POST['article_contenu']);
        $article_img = $_POST['article_img'];
        $article_resume = htmlspecialchars($_POST['article_resume']);
	      $ins = $bdd->prepare('INSERT INTO articles (titre, contenu, img, resum, date_time_publication) VALUES (?, ?,?,?, NOW())');
	      $ins->execute(array($article_titre, $article_contenu, $article_img, $article_resume));
	      $message = 'Votre article a bien été posté';
        
	   } else {
	      $message = 'Veuillez remplir tous les champs';
	   }
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
	   <title>Rédaction</title>
	   <meta charset="utf-8">
	</head>
	<body>
	   <form method="POST">
	      <input type="text" name="article_titre" placeholder="Titre" /><br />
	      <textarea name="article_contenu" placeholder="Contenu de l'article"></textarea><br />
        <textarea name="article_resume" placeholder="resume de l'article"></textarea><br />
	      <input type="file" name="article_img" id="fileToUpload">
        <input type="submit" value="Envoyer l'article" />
	   </form>
	   <br />
	   <?php if(isset($message)) { echo $message; } ?>
	</body>
	</html>