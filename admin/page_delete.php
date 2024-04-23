<?php
include_once '../config.php';
if(isset($_GET['remove_id']))
{

	$sqlvc = mysqli_query($conn, "SELECT id,featuredimage,attachment FROM tbl_page WHERE id=".$_GET['remove_id']);
	$row = mysqli_fetch_assoc($sqlvc);
	$sql = $conn->prepare("DELETE FROM tbl_page WHERE id=".$_GET['remove_id']);
	unlink("../uploads/".$row['featuredimage']);
	unlink("../uploads/".$row['attachment']);
	$sql->execute();
	$sql->close(); 
	$conn->close();
}
?>


<script type="text/javascript">
				 window.history.back();
	</script>