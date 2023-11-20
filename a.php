<?php

$user_distance = intval($_POST['distance']);

$transport = $_POST['transport'];
if ($transport == 'open') {
	$less_then_500 = 1.4;
	$between_500_1500 = 1.2;
	$between_1500_2500 = 0.85;
	$more_then_2500 = 0.75;
} else {
	$less_then_500 = 1.6;
	$between_500_1500 = 1.4;
	$between_1500_2500 = 1.5;
	$more_then_2500 = 0.95;
}


if ($user_distance <= 500) {

	$calculation = $user_distance * $less_then_500;
	echo json_encode(['price' => "$" . $calculation]);
} elseif (($user_distance > 500) && ($user_distance <= 1500)) {

	$calculation = $user_distance * $between_500_1500;
	echo json_encode(['price' => "$" . $calculation]);
} elseif (($user_distance > 1500) && ($user_distance <= 2500)) {

	$calculation = $user_distance * $between_1500_2500;
	echo json_encode(['price' => "$" . $calculation]);
} elseif ($user_distance > 2500) {

	$calculation = $user_distance * $more_then_2500;
	echo json_encode(['price' => "$" . $calculation]);
}
