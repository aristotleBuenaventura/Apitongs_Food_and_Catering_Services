<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($conn, "delete from reservation where id=$id");
?>

<script type="text/javascript">
window.location="reservation.php";
alert("Your reservation has been successfully deleted.");
</script>