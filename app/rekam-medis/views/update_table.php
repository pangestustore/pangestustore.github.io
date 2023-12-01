<?php
// update_table.php

// Include the necessary files and initialize the database connection
require_once 'app/functions/MY_model.php';
require_once 'your_database_connection_file.php'; // Replace with your actual database connection file

// Get the selected nomor identitas from the Ajax request
$selectedNomorIdentitas = $_GET['nomor_identitas'];

// Call the function to update the table
updateTableBasedOnPatient($selectedNomorIdentitas);
?>