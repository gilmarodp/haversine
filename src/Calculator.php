<?php

namespace Gilmarodp\Haversine;

class Calculator
{
    /**
     * Calculate the distance between two points using the Haversine formula.
     *
     * @param Point $pointOne The first point.
     * @param Point $pointTwo The second point.
     * @return float The distance in meters.
     */
    public static function distance(Point $pointOne, Point $pointTwo): float
    {
        // Radius of the Earth in meters
        // The average radius of the Earth is approximately 6,371 kilometers or 6,371,000 meters.
        $earthRadius = 6371000;

        if ($pointOne->getLatitude() === $pointTwo->getLatitude() &&
            $pointOne->getLongitude() === $pointTwo->getLongitude()) {
            return 0.0;
        }

        // Convert latitude and longitude from degrees to radians
        $latOne = deg2rad($pointOne->getLatitude());
        $lonOne = deg2rad($pointOne->getLongitude());
        $latTwo = deg2rad($pointTwo->getLatitude());
        $lonTwo = deg2rad($pointTwo->getLongitude());

        // The Haversine formula
        // a = sin²(Δφ/2) + cos φ₁ * cos φ₂ * sin²(Δλ/2)
        // c = 2 * atan2(√a, √(1−a))
        // d = R * c
        // where:
        // φ is latitude, λ is longitude, R is the Earth's radius,
        // and d is the distance between the two points.
        // Δφ is the difference in latitude, Δλ is the difference in longitude
        $deltaLat = $latTwo - $latOne;
        $deltaLon = $lonTwo - $lonOne;

        $a = sin($deltaLat / 2) ** 2 +
             cos($latOne) * cos($latTwo) *
             sin($deltaLon / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }
}
