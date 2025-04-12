<?php
include 'api/Database.php';  // Include the database connection from the 'api' folder

// Get the PDO instance using the singleton method
$pdo = Database::getInstance()->getConnection();

$tenant_name = 'John';
$tenant_fname = 'Doe';
$tenant_email = 'john.doe@example.com';
$tenant_password = 'password123';
$tenant_contact_num = '09123456789';
$room_id = 1;

try {
    // Prepare the SQL query with placeholders for the INSERT
    $stmt = $pdo->prepare("INSERT INTO tenant (tenant_name, tenant_fname, tenant_email, tenant_password, tenant_contact_num, room_id) 
                           VALUES (:tenant_name, :tenant_fname, :tenant_email, :tenant_password, :tenant_contact_num, :room_id)");

    // Bind the values to the query
    $stmt->bindParam(':tenant_name', $tenant_name);
    $stmt->bindParam(':tenant_fname', $tenant_fname);
    $stmt->bindParam(':tenant_email', $tenant_email);
    $stmt->bindParam(':tenant_password', $tenant_password);
    $stmt->bindParam(':tenant_contact_num', $tenant_contact_num);
    $stmt->bindParam(':room_id', $room_id);

    // Execute the query to insert the data
    $stmt->execute();

    // Success message
    echo "Tenant added successfully!";
} catch (PDOException $e) {
    // Catch and display any errors
    echo "Error: " . $e->getMessage();
}
?>
