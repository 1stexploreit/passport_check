<?php include ('session.php');  


// Check if orderId is set in POST data
if(isset($_POST['orderId'])) {
    // Sanitize the input to prevent SQL injection
    $orderId = $_POST['orderId'];

    // Prepare the SQL statement
    $sql = "UPDATE tbl_order SET status = 'verified' WHERE order_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("i", $orderId);

    // Execute the statement
    if ($stmt->execute()) {
        // If the update is successful, return a success message
        echo "Order status updated successfully.";
    } else {
        // If there's an error, return an error message
        echo "Error updating order status: " . $conn->error;
    }

    // Close statement
    $stmt->close();
} else {
    // If orderId is not set in POST data, return an error message
    echo "Order ID not provided.";
}

// Close connection
$conn->close();
?>