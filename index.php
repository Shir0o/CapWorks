<?php require_once('initialize.php'); ?>

<table id="inventory">
  <tr>
    <th>ID</th>
    <th>Brewer</th>
    <th>Name</th>
  </tr>

<?php

$caps = Caps::find_all();

?>

  <?php foreach ($caps as $cap) { ?>
    <tr>
      <td><?php echo h($cap->id); ?></td>
      <td><?php echo h($cap->brewer); ?></td>
      <td><?php echo h($cap->name); ?></td>
    </tr>
  <?php } ?>

</table>

<?php

// if ($result->num_rows > 0) {
//     echo "<table><tr><th>ID</th><th>Brewer</th><th>Name</th></tr>";
//     while($row = $result->fetch_assoc()) {
//         echo "<tr><td>".$row["id"]."</td><td>".$row["brewer"]."</td><td>".$row["namename"]."</td></tr>";
//     }
//     echo "</table>";
// } else {
//     echo "0 results";
// }

?>
