<?php require_once('initialize.php'); ?>

<?php

  $id = $_GET['id'] ?? false;
  if(!$id) {
    redirect_to('index.php');
  }

  $cap = Caps::find_by_id($id);

?>

<?php include('shared/header.php'); ?>

<div id="main">
  <a href="index.php">Back</a>

  <div id="page">
    <h1>View</h1>

    <div class="detail">
      <dl>
        <dt>ID</dt>
        <dd><?php echo h($cap->id); ?></dd>
      </dl>
      <dl>
        <dt>Brewer</dt>
        <dd><?php echo h($cap->brewer); ?></dd>
      </dl>
      <dl>
        <dt>Name</dt>
        <dd><?php echo h($cap->name); ?></dd>
      </dl>
    </div>
  </div>
</div>

<?php include('shared/footer.php'); ?>
