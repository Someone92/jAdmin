<?php
$title = "Ny post | jAdmin";
/* Header */
require "include/header.php";

/* Navigation */
require "include/navigation.php";

if(isset($_GET["new-post"])) {
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
    
    $name           = $_POST["name"];
    $url            = $_POST["url"];
    $aboutClient    = $_POST["aboutClient"];
    $aboutProject   = $_POST["aboutProject"];
    $created        = $_POST["created"];
    
    $sql = "INSERT INTO portfolio (id, name, url, aboutClient, aboutProject, created)
    VALUES ('', '$name', '$url', '$aboutClient', '$aboutProject', '$created')";
    // use exec() because no results are returned
    $pdo->exec($sql);
    
    /* Creates row in the table extra */
    $sql = "INSERT INTO extra (id, extraText1, extraImg1, extraText2, extraImg2, extraText3, extraImg3, extraText4, extraImg4, extraText5, extraImg5)
    VALUES ('', '', '', '', '', '', '', '', '', '', '')";
    $pdo->exec($sql);
    
    $service1 = $_POST["service1"];
    $service2 = $_POST["service2"];
    $service3 = $_POST["service3"];
    $service4 = $_POST["service4"];
    $service5 = $_POST["service5"];
    /* Creates row in the table service */
    $sql = "INSERT INTO service (id, service1, service2, service3, service4, service5)
    VALUES ('', '$service1', '$service2', '$service3', '$service4', '$service5')";
    $pdo->exec($sql);
    
    header("location: post.php");
}
?>
<div class="container">
    <form method="post" action="new-post.php?new-post">
        <div class="dashboard-header">
            <h1>Ny Post</h1>
        </div>
        <div class="post-container z-depth-1">
            <div class="post-container new_post">
                <input name="name" type="text" placeholder="Ange företag här" required>
                <input name="id" style="display: none;">
                Url: <input name="url" type="text" required>
                aboutClient: <textarea name="aboutClient" type="text" required></textarea>
                aboutProject: <textarea name="aboutProject" type="text" required></textarea>
                service: 
                <p>
                    <input id="service1" type="checkbox" name="service1" value="Hemsida">
                    <label for="service1">Hemsida</label>
                </p>
                <p>
                    <input id="service2" type="checkbox" name="service2" value="Mobil">
                    <label for="service2">Mobil</label>
                </p>
                <p>
                    <input id="service3" type="checkbox" name="service3" value="Wordpress">
                    <label for="service3">Wordpress</label>
                </p>
                <p>
                    <input id="service4" type="checkbox" name="service4" value="jAdmin CMS">
                    <label for="service4">jAdmin CMS</label>
                </p>
                <p>
                    <input id="service5" type="checkbox" name="service5" value="Test">
                    <label for="service5">Test</label>
                </p>
                Skapad: <input name="created" type="date" required>
                <button class="z-depth-1" type="submit"><i class="fa fa-pencil"></i>Posta</button>
            </div>
        </div>
    </form>
</div>
<?php require "include/footer.php"; ?>



















