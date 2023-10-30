<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Xplor\Command;
use Xplor\Robot;

final class CommandRotateTest extends TestCase {
    public function testLeft() {
        $robot = new Robot();
        $robot->x = 0;
        $robot->y = 0;
        $robot->f = Robot::FACE_SOUTH;

        $command = new Command();

        $moved = $command->left($robot);

        $this->assertSame($moved, $robot);
        $this->assertSame(Robot::FACE_EAST, $moved->f);
    }

    public function testLeftOfNorth() {
        $robot = new Robot();
        $robot->x = 0;
        $robot->y = 0;
        $robot->f = Robot::FACE_NORTH;

        $command = new Command();

        $moved = $command->left($robot);

        $this->assertSame($moved, $robot);
        $this->assertSame(Robot::FACE_WEST, $moved->f);
    }
    public function testRight() {
        $robot = new Robot();
        $robot->x = 0;
        $robot->y = 0;
        $robot->f = Robot::FACE_SOUTH;

        $command = new Command();

        $moved = $command->right($robot);

        $this->assertSame($moved, $robot);
        $this->assertSame(Robot::FACE_WEST, $moved->f);
    }

    public function testRightOfWest() {
        $robot = new Robot();
        $robot->x = 0;
        $robot->y = 0;
        $robot->f = Robot::FACE_WEST;

        $command = new Command();

        $moved = $command->right($robot);

        $this->assertSame($moved, $robot);
        $this->assertSame(Robot::FACE_NORTH, $moved->f);
    }
}
