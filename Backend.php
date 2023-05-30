<?php
// Database connection
$host = "localhost";
$dbname = "your_database_name";
$username = "your_username";
$password = "your_password";

try {
  $db = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

// Get form data
$issueTitle = $_POST["issueTitle"];
$incidentType = $_POST["incidentType"];
$incidentNumber = $_POST["incidentNumber"];
$startDateTime = $_POST["startDateTime"];
$endDateTime = $_POST["endDateTime"];
$relatedTeam = $_POST["relatedTeam"];
$shiftPersons = $_POST["shiftPersons"];
$issueResolution = $_POST["issueResolution"];

// Insert data into the database
try {
  $query = "INSERT INTO your_table_name (issue_title, incident_type, incident_number, start_datetime, end_datetime, related_team, shift_persons, issue_resolution)
            VALUES (:issueTitle, :incidentType, :incidentNumber, :startDateTime, :endDateTime, :relatedTeam, :shiftPersons, :issueResolution)";

  $statement = $db->prepare($query);
  $statement->bindParam(":issueTitle", $issueTitle);
  $statement->bindParam(":incidentType", $incidentType);
  $statement->bindParam(":incidentNumber", $incidentNumber);
  $statement->bindParam(":startDateTime", $startDateTime);
  $statement->bindParam(":endDateTime", $endDateTime);
  $statement->bindParam(":relatedTeam", $relatedTeam);
  $statement->bindParam(":shiftPersons", $shiftPersons);
  $statement->bindParam(":issueResolution", $issueResolution);

  $statement->execute();

  echo "success";
} catch (PDOException $e) {
  echo "error";
}
?>
