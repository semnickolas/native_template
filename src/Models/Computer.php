<?php

namespace src\Models;

/**
 * Class Computer
 * @package src\Models
 */
class Computer
{
    const BOOT_ADDRESS = 0;
    const BOOT_SECTOR = 1;
    const SECTOR_SIZE = 16;

    /**
     * @var CPU
     */
    protected $cpu;

    /**
     * @var Memory
     */
    protected $mem;

    /**
     * @var Disk
     */
    protected $hd;

    /**
     * Computer constructor.
     * @param CPU $cpu
     * @param Memory $mem
     * @param Disk $hd
     */
    public function __construct(CPU $cpu, Memory $mem, Disk $hd)
    {
        $this->cpu = $cpu;
        $this->mem = $mem;
        $this->hd = $hd;
    }

    /**
     * Start computer method
     */
    public function startComputer()
    {
        $this->cpu->freeze();
        $dataForStart = $this->hd->read(
            static::BOOT_SECTOR,
            static::SECTOR_SIZE
        );
        $this->mem->load(
            static::BOOT_ADDRESS,
            $dataForStart
        );
        $this->cpu->jump(self::BOOT_ADDRESS);
        $this->cpu->execute();
    }
}