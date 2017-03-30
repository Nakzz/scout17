<?php

require_once 'infodb.php';

(isset($_POST['team_id']) && isset($_POST['match__id'])) or
  die("<p>Need at least a team number and a match number.</p>");

$team_id = SanitizeString($_POST['team_id']);
$match__id = SanitizeString($_POST['match__id']);

$auto_cross_line = SanitizeString($_POST['auto_cross_line']);
$auto_gear_left = SanitizeString($_POST['auto_gear_left']);
$auto_gear_center = SanitizeString($_POST['auto_gear_center']);
$auto_gear_right = SanitizeString($_POST['auto_gear_right']);
$auto_fuel_low = SanitizeString($_POST['auto_fuel_low']);
$auto_fuel_high = SanitizeString($_POST['auto_fuel_high']);

$gears = SanitizeString($_POST['gears']);
$fuel_low = SanitizeString($_POST['fuel_low']);
$fuel_high = SanitizeString($_POST['fuel_high']);
$climb = SanitizeString($_POST['climb']);

$floor_gear = SanitizeString($_POST['floor_gear']);
$floor_ball = SanitizeString($_POST['floor_ball']);
$defense = SanitizeString($_POST['defense']);
$load_hopper = SanitizeString($_POST['load_hopper']);

$fouls = SanitizeString($_POST['fouls']);
$tech_fouls = SanitizeString($_POST['tech_fouls']);
$died = SanitizeString($_POST['died']);

$db_server = mysql_connect($db_hostname, $db_username , $db_password);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database) or
  die("Unable to select database: " . mysql_error());

$query = "INSERT stat (team_id, match__id, auto_cross_line "
         . "  , auto_gear_left, auto_gear_center, auto_gear_right "
         . "  , auto_fuel_low, auto_fuel_high, teleop_gears "
         . "  , teleop_fuel_low, teleop_fuel_high, teleop_climb "
         . "  , floor_gear_pickup, floor_ball_pickup, defense "
         . "  , load_from_hopper, fouls, tech_fouls "
         . "  , died) "
         . "VALUES ($team_id, '$match__id', $auto_cross_line "
         . "  , $auto_gear_left, $auto_gear_center, $auto_gear_right "
         . "  , $auto_fuel_low, $auto_fuel_high, $gears "
         . "  , $fuel_low, $fuel_high, $climb "
         . "  , $floor_gear, $floor_ball, $defense "
         . "  , $load_hopper, $fouls, $tech_fouls "
         . "  , $died ) ";

$result = mysql_query($query);
//echo "<p>$query</p>"; //debug
if (!$result) die("Database stat insert failed: " . mysql_error());

echo "<p>Team $team_id stats for match id $match__id saved.</p>"; 

function SanitizeString($var) {
    if (empty($var)) {
        $var = 'NULL';
    } else {
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripslashes($var);
    }
    return $var;
}

?>