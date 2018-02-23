<?php require_once('initialize.php'); ?>

<?php

$sql = "SELECT * FROM caps";
$result = Caps::$database->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Brewer</th><th>Name</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["brewer"]."</td><td>".$row["name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

 ?>
