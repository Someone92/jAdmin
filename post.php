<?php
$title = "Post | jAdmin";
/* Header */
require "include/header.php";

/* Navigation */
require "include/navigation.php";
?>
<div class="container">
    <div class="dashboard-header">
        <h1>Inlägg</h1>
    </div>
    
    <div class="post-container z-depth-1">
        <h2>
            <a href="new-post.php" class="new-post z-depth-1" type="submit">Ny Post</a>
        </h2>
        <?php
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
        $query = $pdo->prepare("SELECT * FROM portfolio");
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        ?>
        <table class="paginated">
            <thead>
                <tr class="table-header">
                    <th>Id</th>
                    <th>Namn</th>
                    <th>Skapad</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($result as $row) {
                    echo '<tr class="td">';
                    echo '<td>'.$row["id"].'</td>';
                    echo '<td><a href="'.$row["url"].'">'.$row["name"].'</a></td>';
                    echo '<td>'.$row["created"].'</td>';
                    echo '<td><a href="edit-post.php?edit='.$row["id"].'" title="Redigera"><i class="fa fa-pencil"></i></a><a class="confirmation" href="database/delete-post.php?delete='.$row["id"].'" title="Radera"><i class="fa fa-trash"></i></a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    
        <div class="post-bottom">
            <div class="post-showing">
                <div class="post-entries">
                    Visar
                    <select id="show-entries" name="show-entries">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                    poster per sida
                </div>
            </div>
            <div class="post-page">
                <!-- span.page-number -->
            </div>
        </div>
    </div>
</div>





<?php require "include/footer.php"; ?>