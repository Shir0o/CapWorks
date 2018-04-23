<?php require_once('initialize.php'); ?>

<?php include('shared/header.php'); ?>

<?php

$id = $_GET['id'] ?? false;
if (!$id) {
    redirect_to('index.php');
}

$cap = Caps::find_by_id($id);

if (is_post_request()) {
    $args = [];
    $args['id'] = $_POST['id'] ?? NULL;
    $args['brewer'] = $_POST['brewer'] ?? NULL;
    $args['name'] = $_POST['name'] ?? NULL;

    $cap->merge_attributes($args);
    $result = $cap->update();

    if($result === true) {
        redirect_to('detail.php?id=' . $cap->id);
    } else {}
} else {}

 ?>

<div id="main">
    <a href="index.php">Back</a>

    <div id="page">
        <h1>Update</h1>

        <form action="update.php?id=<?php echo $cap->id; ?>" method="post">
        <dl>
            <dt>ID</dt>
            <dd><input type="text" name="id" value="<?php echo h($cap->id); ?>" /></dd>
        </dl>
        <dl>
            <dt>Brewer</dt>
            <dd><input type="text" name="brewer" value="<?php echo h($cap->brewer); ?>" /></dd>
        </dl>
        <dl>
            <dt>Name</dt>
            <dd><input type="text" name="name" value="<?php echo h($cap->name); ?>" /></dd>
        </dl>
        <dl>
            <dt>Type</dt>
            <dd><input type="text" name="id" value="<?php echo h($cap->type); ?>" /></dd>
        </dl>
        <dl>
            <dt>Country</dt>
            <dd><input type="text" name="brewer" value="<?php echo h($cap->country); ?>" /></dd>
        </dl>
        <dl>
            <dt>Color</dt>
            <dd><input type="text" name="name" value="<?php echo h($cap->color); ?>" /></dd>
        </dl>
        <dl>
            <dt>Other Color</dt>
            <dd><input type="text" name="id" value="<?php echo h($cap->othercolor); ?>" /></dd>
        </dl>
        <dl>
            <dt>Text Color</dt>
            <dd><input type="text" name="brewer" value="<?php echo h($cap->textcolor); ?>" /></dd>
        </dl>
        <dl>
            <dt>Rim Color</dt>
            <dd><input type="text" name="name" value="<?php echo h($cap->rimcolor); ?>" /></dd>
        </dl>
        <dl>
            <dt>Text</dt>
            <dd><input type="text" name="id" value="<?php echo h($cap->text); ?>" /></dd>
        </dl>
        <dl>
            <dt>Opening</dt>
            <dd><input type="text" name="brewer" value="<?php echo h($cap->opening); ?>" /></dd>
        </dl>

        <div id="operations">
            <input type="submit" value="Submit" />
        </div>
        </form>
    </div>
</div>

<?php include('shared/footer.php'); ?>
