<?php

namespace Gilmarodp\Haversine;

class Point
{
    /**
     * Latitude of the point.
     *
     * @var float
     */
    private float $latitude;

    /**
     * Longitude of the point.
     *
     * @var float
     */
    private float $longitude;

    /**
     * Create a new Point instance.
     *
     * @param float $latitude Latitude of the point.
     * @param float $longitude Longitude of the point.
     * @param int $precision Number of decimal places to round the coordinates.
     */
    public function __construct(float $latitude, float $longitude, int $precision = 6)
    {
        $this->latitude = round($latitude, $precision);
        $this->longitude = round($longitude, $precision);
    }

    /**
     * Get the latitude of the point.
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Get the longitude of the point.
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Get the coordinates of the point as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }

    /**
     * Get the coordinates of the point as a string.
     *
     * @return string
     */
    public function toString(): string
    {
        return sprintf('%s, %s', $this->latitude, $this->longitude);
    }
}
