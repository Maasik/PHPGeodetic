<?php

/**
 *
 * Class that accepts an array of Distance values for a Translation Vector and creates a standardised interface
 * that can be passed to the Translation Vector constructor
 *
 * @package Geodetic
 * @copyright  Copyright (c) 2012 Mark Baker (https://github.com/MarkBaker/PHPGeodetic)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class Geodetic_TranslationVectorArray extends Geodetic_Distance_Abstract
{
    /**
     * Create an XYZ-Format interface object for Translation Vector Distance Coordinates from an array of values
     *
     * @param     (integer|float|Geodetic_Distance)[]    $distances    The array of X, Y and Z distance values
     * @param     string                                 $uom          The unit of measure for these distance values
     *                                                                     (if they are passed as integer or float)
     * @throws    Geodetic_Exception
     */
    public function __construct(array $distances = NULL,
                                $uom = Geodetic_Distance::METRES)
    {
        if (is_null($distances))
            throw new Geodetic_Exception('An array of vector distance coordinates must be passed');
        if (count($distances) == 3) {
            list ($xDistance, $yDistance, $zDistance) = array_values($distances);
        } else {
            throw new Geodetic_Exception('Invalid number of vectors distances in array');
        }

        $this->setValues($xDistance, $yDistance, $zDistance, $uom);
    }

}
