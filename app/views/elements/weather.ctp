<?php

//imports the xml class
App::import('Xml');

//location of the xml file's location
$file = "http://weather.yahooapis.com/forecastrss?w=12779694";

//Parse it, baby!
$weather =& new XML($file);
$weather = Set::reverse($weather);

$today = $weather['Rss']['Channel']['Item']['Condition'];
$tomorrow = $weather['Rss']['Channel']['Item']['Forecast'][0];
$dayAfterTomorrow = $weather['Rss']['Channel']['Item']['Forecast'][1];

switch($today['code']) {
	case 3:case 4:
		$image = "thunderstorm";
		break;
	case 5:case 6:case 7:case 8:case 10:case 18:
		$image = "freezing-rain";
		break;
	case 9:case 11: case 12:
		$image = "showers";
		break;
	case 13:case 14:case 15:
		$image = "flurries";
		break;
	case 17: case 35:
		$image = "hail";
		break;
	case 20:case 22:
		$image = "fog";
		break;
	case 21:
		$image = "smog";
		break;
	case 26:
		$image = "cloudy";
		break;
	case 27:case 28:
		$image = "mostly-cloudy";
		break;
	case 29: case 30:
		$image = "cloudy";
	case 32: case 36:
		$image = "sunny";
		break;
	case 33: case 34: case 44:
		$image = "partly-cloudy";
		break;
	case 37: case 38: case 39: case 45: case 47:
		$image = "thunderstorm";
		break;
	case 40:
		$image = "showers";
		break;
	case 41: case 42: case 43: case 46:
		$image = "snow";
	default:
		$image = "na";
		break;
}

?>

<div id="weather" class="side">
	<?php echo $this->Html->image("weather/$image.png", array(
		'alt' => 'weather icon',
	));?>
	<h3><?php echo $today['temp']; ?>&deg;</h3><br/>
	<strong><?php echo $tomorrow['day']; ?>: </strong>
	<span class="high"><?php echo $tomorrow['high']; ?></span> - <span class="low"><?php echo $tomorrow['low']; ?>   </span>
	<br/>
	<strong><?php echo $dayAfterTomorrow['day']; ?>: </strong>
	<span class="high"><?php echo $dayAfterTomorrow['high']; ?></span> - <span class="low"><?php echo $dayAfterTomorrow['low']; ?></span>
	<a href="http://www.accuweather.com/us/ia/ames/50010/city-weather-forecast.asp" target="_blank">details</a>
</div>