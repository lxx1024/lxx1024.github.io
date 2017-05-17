<?php
session_start();
session_destroy();
?>
<script>
window.location.href="../index.php";
history.go(-1);
</script>
