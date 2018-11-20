<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="comments.php" method="post">
    <label for="author">Title:</label>
    <input type="text" id="idauthor" name="author" value= "<?php
    if(isset($_COOKIE['author'])){
         echo htmlspecialchars($_COOKIE['author']);
    }?>"><br>
    <label for="content">Content:</label>
    <input type="text" id="idcontent" name="content" placeholder="enter your message"/><br/>
    <input type="submit" value="send" /><br/>
    </form>
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost; dbname=blog', 'kadiy', 'kadiy');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query('SELECT author, comment, date_comment FROM comments ORDER BY ID DESC LIMIT 0,5');

    $donnees = $reponse->fetch();
    while ($donnees = $reponse->fetch()) {
     echo '<p>'. htmlspecialchars($donnees['date_comment']) . '' . htmlspecialchars($donnees['author']) . '' . ':' .  htmlspecialchars($donnees['comment']) . '</p>';
    }
    $reponse->closeCursor();
?>
</body>
</html>
