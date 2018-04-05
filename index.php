<?php require_once('initialize.php'); ?>

<?php include('shared/header.php'); ?>

<table id="inventory">
  <tr>
    <th>ID</th>
    <th>Brewer</th>
    <th>Name</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

<?php

$caps = Caps::find_all();

?>

  <?php foreach ($caps as $cap) { ?>
    <tr>
      <td><?php echo h($cap->id); ?></td>
      <td><?php echo h($cap->brewer); ?></td>
      <td><?php echo h($cap->name); ?></td>
      <td><a href="detail.php?id=<?php echo $cap->id; ?>">View</a></td>
      <td><a href="update.php?id=<?php echo $cap->id; ?>">Update</a></td>
    </tr>
  <?php } ?>

</table>

<?php include('shared/footer.php'); ?>
