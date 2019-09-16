<?php

namespace src\Models;

/**
 * Class Disk
 * @package src\Models
 */
class Disk
{
    /**
     * @param $sector
     * @param $size
     * @return string
     */
    public function read($sector, $size)
    {
        return "data from sector $sector ($size)";
    }
}