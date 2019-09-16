<?php

namespace src;

use src\Models\CPU;
use src\Models\Disk;
use src\Models\Memory;
use src\Models\Computer;

/**
 * Class Application
 * @package src
 */
class Application
{
    /**
     * Run an application
     */
    public function run()
    {
        $pc = new Computer(
            new CPU(),
            new Memory(),
            new Disk()
        );
        $pc->startComputer();
    }
}