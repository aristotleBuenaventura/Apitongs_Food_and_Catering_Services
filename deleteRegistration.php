<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($conn, "delete from registration where id=$id");
?>
<script type="text/javascript">
window.location="admin.php";
</script>