<?php

use app\controllers\RoadTripController;

$routes = [
    'road-trip' => [
        'controller' => RoadTripController::class,
        'GET' => 'getRoadTripData',
    ],
];