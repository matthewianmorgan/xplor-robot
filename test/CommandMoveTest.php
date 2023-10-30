<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Xplor\Command;
use Xplor\Robot;

final class CommandMoveTest extends TestCase {
    public function testNorth() {
        $robot = new Robot();
        $robot->x = 0;
        $robot->y = 0;
        $robot->f = Robot::FACE_NORTH;

        $command = new Command();

        $moved = $command->move($robot);

        $this->assertNotSame($moved, $robot);
        $this->assertSame(1, $moved->y);
    }

    public function testSouth() {
        $robot = new Robot();
        $robot->x = 0;
        $robot->y = 2;
        $robot->f = Robot::FACE_SOUTH;

        $command = new Command();

        $moved = $command->move($robot);

        $this->assertNotSame($moved, $robot);
        $this->assertSame(1, $moved->y);
    }

    public function testEast() {
        $robot = new Robot();
        $robot->x = 0;
        $robot->y = 0;
        $robot->f = Robot::FACE_EAST;

        $command = new Command();

        $moved = $command->move($robot);

        $this->assertNotSame($moved, $robot);
        $this->assertSame(1, $moved->x);
    }

    public function testWest() {
        $robot = new Robot();
        $robot->x = 2;
        $robot->y = 0;
        $robot->f = Robot::FACE_WEST;

        $command = new Command();

        $moved = $command->move($robot);

        $this->assertNotSame($moved, $robot);
        $this->assertSame(1, $moved->x);
    }

    public function testOutOfBounds() {
        $robot = new Robot();
        $robot->x = 0;
        $robot->y = 0;
        $robot->f = Robot::FACE_WEST;

        $command = new Command();

        $moved = $command->move($robot);

        $this->assertSame($moved, $robot);
        $this->assertSame(0, $moved->x);
    }
}
