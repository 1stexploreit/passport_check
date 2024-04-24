<?php include('../config.php');



// Fetch passport number from POST data
$passportNo = $_POST['passport_no'];

// Query to check if the passport number exists in tbl_passport_check
$stmt = $conn->prepare("SELECT * FROM tbl_passport_check WHERE pp_no = ?");
$stmt->bind_param("s", $passportNo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Passport number is valid
    echo 'valid';
} else {
    // Passport number is invalid
    echo 'invalid';
}

$stmt->close();
$conn->close();


	 ?>
