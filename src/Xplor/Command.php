<?php namespace Xplor;

use Xplor\Guard;
use Xplor\Robot;

final class Command {
    public function execute(Robot $robot, string $command): Robot {
        $parts = explode(' ', $command);

        $base = strtolower(array_shift($parts));

        if ($base === 'place') {
            return $this->place($robot, implode(' ', $parts));
        }

        if ($robot->x === null || !method_exists($this, $base)) {
            return $robot;
        }

        return $this->$base($robot);
    }

    public function place(Robot $original, string $coordinates): Robot {
        $updated = clone($original);

        list($x, $y, $f) = explode(',', $coordinates);

        $updated->x = (int)trim($x);
        $updated->y = (int)trim($y);
        $updated->f = strtoupper(trim($f));

        return Guard::assert($updated) ? $updated : $original;
    }

    public function move(Robot $original): Robot {
        $updated = clone($original);

        switch($updated->f) {
            case Robot::FACE_NORTH:
                $updated->y++;
                break;

            case Robot::FACE_SOUTH:
                $updated->y--;
                break;

            case Robot::FACE_EAST:
                $updated->x++;
                break;

            case Robot::FACE_WEST:
                $updated->x--;
                break;
        }

        return Guard::assert($updated) ? $updated : $original;
    }

    public function left(Robot $original): Robot {
        $index = array_search($original->f, Robot::FACE_ORDER);
        $index--;

        if ($index === -1) {
            $index = 3;
        }

        $original->f = Robot::FACE_ORDER[$index];

        return $original;
    }

    public function right(Robot $original): Robot {
        $index = array_search($original->f, Robot::FACE_ORDER);
        $index++;

        if ($index === 4) {
            $index = 0;
        }

        $original->f = Robot::FACE_ORDER[$index];

        return $original;
    }

    public function report(Robot $robot): Robot {
        if ($robot->x === null) {
            return $robot;
        }

        printf('Output: %d,%d,%s', $robot->x, $robot->y, $robot->f);
        print(PHP_EOL);

        return $robot;
    }
}