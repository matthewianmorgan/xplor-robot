<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Xplor\Guard;
use Xplor\Robot;

final class GuardTest extends TestCase {
    public function testXLowerBound() {
        $r = new Robot();
        $r->x = -1;
        $r->y = 0;
        $r->f = Robot::FACE_NORTH;

        $this->assertFalse(Guard::assert($r));
    }

    public function testYLowerBound() {
        $r = new Robot();
        $r->x = 0;
        $r->y = -1;
        $r->f = Robot::FACE_NORTH;

        $this->assertFalse(Guard::assert($r));
    }

    public function testXUpperBound() {
        $r = new Robot();
        $r->x = 5;
        $r->y = 0;
        $r->f = Robot::FACE_NORTH;

        $this->assertFalse(Guard::assert($r));
    }

    public function testYUpperBound() {
        $r = new Robot();
        $r->x = 0;
        $r->y = 5;
        $r->f = Robot::FACE_NORTH;

        $this->assertFalse(Guard::assert($r));
    }

    public function testWrongFace() {
        $r = new Robot();
        $r->x = 0;
        $r->y = 0;
        $r->f = 'BLAH';

        $this->assertFalse(Guard::assert($r));
    }
}
