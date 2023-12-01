<?php
// app/rekam-medis/proses/fetch_data.php

// Include necessary files and initialize the database connection
require_once '../../../config/database.php';
require_once '../../../app/functions/MY_model.php';

// Get the selected identification number
$nomorIdentitas = $_GET['nomor_identitas'];

// Fetch data based on the selected identification number
$rekam_medis = get("SELECT *, rm.id as rm_id FROM rekam_medis rm
                    INNER JOIN pasien ON rm.pasien_id = pasien.id 
                    INNER JOIN dokter ON rm.dokter_id = dokter.id 
                    INNER JOIN ruang ON rm.ruang_id = ruang.id
                    WHERE pasien.nomor_identitas = '$nomorIdentitas'");

// Display the fetched data in the table rows
foreach ($rekam_medis as $rm) {
  echo '<tr>';
  echo '<td>' . $rm['tanggal'] . '</td>'; // Replace 'your_column_name' with the actual column name
  echo '<td>' . $rm['another_column_name'] . '</td>'; // Replace 'another_column_name' with the actual column name
  // Add more table row data here based on your structure
  echo '</tr>';
}
?>
