<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Xplor\Command;
use Xplor\Robot;

final class CommandExecuteTest extends TestCase {
    public function testPlace() {
        $robot = new Robot();
        $command = new Command();

        $placed = $command->execute($robot, 'place 0,0,north');

        $this->assertNotSame($placed, $robot);
        $this->assertSame(0, $placed->x);
    }

    public function testIgnoredMove() {
        $robot = new Robot();
        $command = new Command();

        $moved = $command->execute($robot, 'move');

        $this->assertSame($moved, $robot);
        $this->assertNull($robot->x);
    }
}
