<?php
/*
 * File:   airquality.php
 * Author: Iuri Gonçalves
 * Date:   2018
 */
include("db_conn.php");

$hum_weighting = 0.25; // so hum effect is 25% of the total air quality score
$gas_weighting = 0.75; // so gas effect is 75% of the total air quality score
$gas_score = 0.0;
$humidity_score = 0.0;;
$gas_reference = 2500;
$hum_reference = 40;
$getgasreference_count = 0;
$gas_lower_limit = 10000;  // Bad air quality limit
$gas_upper_limit = 300000; // Good air quality limit

var_dump($mysqli);



  // Set up oversampling and filter initialization
  //bme.setTemperatureOversampling(BME680_OS_8X);
  //bme.setHumidityOversampling(BME680_OS_2X);
  //bme.setPressureOversampling(BME680_OS_4X);
  //bme.setIIRFilterSize(BME680_FILTER_SIZE_3);
  //bme.setGasHeater(320, 150); // 320°C for 150 ms
  // Now run the sensor to normalise the readings, then use combination of relative humidity and gas resistance to estimate indoor air quality as a percentage.
  // The sensor takes ~30-mins to fully stabilise
  //function GetGasReference();
  /*$query4 = "SELECT * from sensors_readings where id_sensor = 4 order by reading_Date DESC LIMIT 1";
	$exec = mysqli_query($mysqli,$query4);*/ //se o gas_reference funcionar

  //$humidity_score = GetHumidityScore();
  //$gas_score      = GetGasScore();

  //Combine results for the final IAQ index value (0-100% where 100% is good quality air)
  
  //if ((getgasreference_count++) % 5 == 0) GetGasReference();

/*function GetGasReference() {
  // Now run the sensor for a burn-in period, then use combination of relative humidity and gas resistance to estimate indoor air quality as a percentage.
  //Serial.println("Getting a new gas reference value");
  $readings = 10;
  for ($i = 1; i <= $readings; $i++) { // read gas for 10 x 0.150mS = 1.5secs
    $gas_reference += $query4;
  }
  $gas_reference = $gas_reference / $readings;
  //Serial.println("Gas Reference = "+String(gas_reference,3));
}*/

//function GetHumidityScore() {  //Calculate humidity contribution to IAQ index
  $query2 = "SELECT * from sensors_readings where id_sensor = 3 order by reading_Date DESC, reading_hour DESC LIMIT 1";  
  var_dump($mysqli);
  $result = $mysqli->query($query2);
  $date = $result->fetch_object()->reading_date;
  $time = $result->fetch_object()->reading_hour;
  $current_humidity = $$result->fetch_object()->readings;
  if ($current_humidity >= 38 && $current_humidity <= 42) // Humidity +/-5% around optimum
    $humidity_score = 0.25 * 100;
  else
  { // Humidity is sub-optimal
    if ($current_humidity < 38)
      $humidity_score = 0.25 / $hum_reference * $current_humidity * 100;
    else
    {
      $humidity_score = ((-0.25 / (100 - $hum_reference) * $current_humidity) + 0.416666) * 100;
    }
  }
    $SQL = "INSERT INTO sensors_readings (id_sensor,reading_date,reading_hour,readings,id_location) VALUES ('5','$date','$time','".$GET["Humidity"]."','".$_GET["country"]."');";
    $result = $mysqli->query($SQL);
//}

//function GetGasScore() {
  //Calculate gas contribution to IAQ index	
  $query4 = "SELECT * from sensors_readings where id_sensor = 4 order by reading_Date DESC, reading_hour DESC LIMIT 1";  
  var_dump($mysqli);
  $result = $mysqli->query($query4);
  $date = $result->fetch_object()->reading_date;
  $time = $result->fetch_object()->reading_hour;
  $gas_score = $$result->fetch_object()->readings;
	$readings = 10;
  for ($i = 1; i <= $readings; $i++) { // read gas for 10 x 0.150mS = 1.5secs
    $gas_reference += $query4;
  }
  $gas_reference = $gas_reference / $readings;
  //Serial.println("Gas Reference = "+String(gas_reference,3));
	$gas_score = (0.75 / ($gas_upper_limit - $gas_lower_limit) * $gas_reference - ($gas_lower_limit * (0.75 / ($gas_upper_limit - $gas_lower_limit)))) * 100.00;
	if ($gas_score > 75) $gas_score = 75; // Sometimes gas readings can go outside of expected scale maximum
	if ($gas_score <  0) $gas_score = 0;  // Sometimes gas readings can go outside of expected scale minimum	
	$SQL = "INSERT INTO sensors_readings (id_sensor,reading_date,reading_hour,readings,id_location) VALUES ('6','$date','$time','".$gas_score."','".$_GET["country"]."');";
	$result = $mysqli->query($SQL);
//}

  //$humidity_score 	 = GetHumidityScore();
  //$gas_score      	 = GetGasScore();
  $air_quality_score = $humidity_score + $gas_score;
  
//function CalculateIAQ(int $score) {
  $score = (100 - $score) * 5;
  if      ($score >= 301)                   $IAQ_text += "Hazardous";
  else if ($score >= 201 && $score <= 300 ) $IAQ_text += "Very Unhealthy";
  else if ($score >= 176 && $score <= 200 ) $IAQ_text += "Unhealthy";
  else if ($score >= 151 && $score <= 175 ) $IAQ_text += "Unhealthy for Sensitive Groups";
  else if ($score >=  51 && $score <= 150 ) $IAQ_text += "Moderate";
  else if ($score >=  00 && $score <=  50 ) $IAQ_text += "Good";
  //Serial.print("IAQ Score = " + String(score) + ", ");
  $SQL = "INSERT INTO sensors_readings (id_sensor,reading_date,reading_hour,readings,id_location) VALUES ('7','$date','$time','".$score."','".$_GET["country"]."');";
    $result = $mysqli->query($SQL);
//}
?>
