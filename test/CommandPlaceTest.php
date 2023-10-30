<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Xplor\Command;
use Xplor\Robot;

final class CommandPlaceTest extends TestCase {
    public function testBasicSuccess() {
        $robot = new Robot();
        $command = new Command();

        $placed = $command->place($robot, '0,0,NORTH');

        $this->assertNotSame($placed, $robot);
        $this->assertSame(0, $placed->x);
        $this->assertSame(0, $placed->y);
        $this->assertSame(Robot::FACE_NORTH, $placed->f);
    }

    public function testBadCoordinates() {$robot = new Robot();
        $command = new Command();

        $placed = $command->place($robot, '0,0,DOWN');

        $this->assertSame($placed, $robot);
    }
}