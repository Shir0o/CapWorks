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
            <dl>
                <dt>Type</dt>
                <dd><?php echo h($cap->type); ?></dd>
            </dl>
            <dl>
                <dt>Country</dt>
                <dd><?php echo h($cap->country); ?></dd>
            </dl>
            <dl>
                <dt>Color</dt>
                <dd><?php echo h($cap->color); ?></dd>
            </dl>
            <dl>
                <dt>Other Color</dt>
                <dd><?php echo h($cap->othercolor); ?></dd>
            </dl>
            <dl>
                <dt>Text Color</dt>
                <dd><?php echo h($cap->textcolor); ?></dd>
            </dl>
            <dl>
                <dt>Rim Color</dt>
                <dd><?php echo h($cap->rimcolor); ?></dd>
            </dl>
            <dl>
                <dt>Text</dt>
                <dd><?php echo h($cap->text); ?></dd>
            </dl>
            <dl>
                <dt>Opening</dt>
                <dd><?php echo h($cap->opening); ?></dd>
            </dl>
            <dl>
                <dt>Image</dt>
                <dd><?php echo '<img src="data:image;base64,' . $cap->select_by_sql("SELECT image FROM CAPS")["image"] . ' "> '; ?></dd>
            </dl>
        </div>
    </div>
</div>

<?php include('shared/footer.php'); ?>
