<?php 

$conn = mysqli_connect("localhost","root","","pelanggan");

function hapus($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_pelanggan WHERE id = $id ");

	return mysqli_affected_rows($conn);
}

$id = $_GET["id"];

if (hapus($id) > 0){
	echo "
		<script>
			alert('Data berhasil dihapus');
			document.location.href = 'index.php';
		</script>

		";

	}
		else {
	echo"
		<script>
			alert('Data gagal dihapus');
			document.location.href = 'index.php';
		</script>

		";			
	}
 ?>
