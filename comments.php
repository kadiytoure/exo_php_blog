
    <?php
    $author = htmlspecialchars ($_POST['author']);
    $content = htmlspecialchars ($_POST['content']);

    if (empty($_POST['author'] AND $_POST['content'])){
        http_response_code(400);
        header('Content-Type: text/plain');
        echo 'expect a message parameter';
        exit(1);
    }
    $date_comment = date("Y-m-d H:i:s");

    setcookie('author', $author, time() + 365*24*3600, null, null, false, true);

    try {
    $bdd = new PDO('mysql:host=localhost; dbname=blog', 'kadiy', 'kadiy');    
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->prepare('INSERT INTO billets(`id`, `title`, `author`, `content`, `date_creation`) VALUES(:id, :title, :author, :content, :date_creation)');

    $req = $bdd->prepare('INSERT INTO comments(`id`, `title`, `author`, `content`, `date_creation`) VALUES(:id, :title, :author, :content, :date_creation)');

    $req->execute(array(
        'id' => $id,
        'title' => $title,
        'author' => $author,
        'content' => $content,
        'date_creation' => $date_creation
    ));

    header('Location: index.php');
    ?>
