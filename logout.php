<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header

session_unset();
session_destroy(); ?>
<div class="container">
<?php echo 'LOGGED OUT';?>
</div>
<script type="text/javascript">
    refresh('.navbar-collapse');
</script>
<?php //header('Location: index.php');
include_once(getRoot('/template/footer.php')); ?>