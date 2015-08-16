<?php
$title = "Redigera post | jAdmin";
/* Header */
require "include/header.php";

/* Navigation */
require "include/navigation.php";


$host = "127.0.0.1";
$user = "root";
$pass = "demo";
$database = "jenscv";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $err) {
    die($err->getMessage());
}

if(isset($_GET["update-post"])) {
    $id             = $_POST["id"];
    $name           = $_POST["name"];
    $url            = $_POST["url"];
    $aboutClient    = $_POST["aboutClient"];
    $aboutProject   = $_POST["aboutProject"];
    $created        = $_POST["created"];

    $sql = 'UPDATE `portfolio` 
    SET name="'.$name.'",
        url="'.$url.'",
        aboutClient="'.$aboutClient.'",
        aboutProject="'.$aboutProject.'",
        created="'.$created.'"
    WHERE id="'.$id.'"';
    $pdo->exec($sql);
    
    $sql = 'UPDATE `extra` 
    SET extraText1="",
        extraImg1="",
        extraText2="",
        extraImg2="",
        extraText3="",
        extraImg3="",
        extraText4="",
        extraImg4="",
        extraText5="",
        extraImg5=""
    WHERE id="'.$id.'"';
    $pdo->exec($sql);
    
    $sql = 'UPDATE `service` 
    SET service1="",
        service2="",
        service3="",
        service4="",
        service5=""
    WHERE id="'.$id.'"';
    $pdo->exec($sql);
    header("location: post.php");
}
?>
<div class="container">
    <?php
        if(isset($_GET["edit"])) {
            $id = $_GET['edit']; 
            $query = $pdo->prepare("SELECT * FROM portfolio WHERE id='$id'");
            $query->execute();
            $result = $query->fetchALL(PDO::FETCH_ASSOC);

            foreach($result as $row) {
                echo '<div class="post-container edit z-depth-1">';
                echo '<h2>Redigerar: <span>'.$row["name"].'</span></h2>';
                echo '<form method="post" action="edit-post.php?update-post">';
                echo '<input name="id" style="display: none;" value="'.$row["id"].'">';
                echo 'Namn: <input name="name" type="text" value="'.$row["name"].'" required>';
                echo 'Url: <input name="url" type="text" value="'.$row["url"].'" required>';
                echo 'aboutClient: <textarea name="aboutClient" type="text" required>'.$row["aboutClient"].'</textarea>';
                echo 'aboutProject: <textarea name="aboutProject" type="text" required>'.$row["aboutProject"].'</textarea>';
                echo 'created: <input name="created" type="date" value="'.$row["created"].'" required>';
                echo '<button class="z-depth-1" type="submit"><i class="fa fa-pencil"></i>Uppdatera</button>';
                echo '</form>';
                echo '</div>';
            }
        } ?>
</div>
<?php require "include/footer.php"; ?>