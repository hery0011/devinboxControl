<?php 
	if (isset($_POST['responsable']) && isset($_POST['id'])) {
		$responsable = $_POST['responsable'];
		$id = $_POST['id'];
		$status = "non";
		$attestation = "non";
		//var_dump($_POST);

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "devinboxw3school";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE clients SET responsable='$responsable',status='$status',attestation='$attestation' WHERE id=$id";

		if (mysqli_query($conn, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
		}

?>


<?php 
	if (isset($_POST['status']) && isset($_POST['id'])) {
		$status = $_POST['status'];
		$id = $_POST['id'];
		$attestation = "non";


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "devinboxw3school";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE clients SET status='$status',attestation='$attestation' WHERE id=$id";

		if (mysqli_query($conn, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
		
	}

	?>


	<!-- pour attestation -->
	<?php 
		if (isset($_POST['attestation']) && isset($_POST['id'])) {
		$attestation = $_POST['attestation'];
		$id = $_POST['id'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "devinboxw3school";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE clients SET attestation='$attestation' WHERE id=$id";

		if (mysqli_query($conn, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
			
		}

	?>


	<!-- pour notes -->
	<?php 
	if (isset($_POST['notes']) && isset($_POST['id'])) {
		$notes = $_POST['notes'];
		$id = $_POST['id'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "devinboxw3school";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE clients SET notes='$notes' WHERE id=$id";

		if (mysqli_query($conn, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}

		mysqli_close($conn);
			
		}

	?>