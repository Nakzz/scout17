<?php

/*
 * Copyright (c) 2015 FRC Team 1635
 */
 
require_once 'infodb.php';

$mysqli = new mysqli($db_hostname, $db_username , $db_password, $db_database);

if ($mysqli->connect_errno) 
  die("Unable to connect to MySQL: " 
    . $mysqli->connect_errno . " " 
    . $mysqli->connect_error);

$query = "SELECT m.id, m.event_id, e.name "
         . "  , e.code, m.type_, m.number_ "
         . "  , m.red_team1_id, m.red_team2_id, m.red_team3_id "
         . "  , blue_team1_id, blue_team2_id, blue_team3_id "
         . "FROM match_ m "
         . "  JOIN current_ c "
         . "    ON  m.number_ = c.match_number "
         . "      AND m.type_ = c.match_type "
         . "  JOIN event e "
         . "    ON c.event_code = e.code "
         . "      AND e.id = m.event_id "; 

$result = $mysqli->query($query);
$row = $result->fetch_assoc();
//echo "<p>$query</p>"; //debug
// if (!$result) 
//   die("Query failed: "
//     . $mysqli->connect_errno . " " 
//     . $mysqli->connect_error);

//TODO: check that we get one row and only one row
//TODO : how do I return the error to the front-end?  
//  Right now I get an unexpected identifier just after deploying
//  with no rows in the table 
//TODO: should figure out how the first match gets inserted
$match = array(
  'id' => $row['id']
  , 'event_id' => $row['event_id']
  , 'event_name' => $row['name']
  , 'event_code' => $row['code']
  , 'match_type' => $row['type_']
  , 'number_' => $row['number_']
  , 'red_team1_id' => $row['red_team1_id']
  , 'red_team2_id' => $row['red_team2_id']
  , 'red_team3_id' => $row['red_team3_id']
  , 'blue_team1_id' => $row['blue_team1_id']
  , 'blue_team2_id' => $row['blue_team2_id']
  , 'blue_team3_id' => $row['blue_team3_id']
);

echo json_encode($match); 
?>