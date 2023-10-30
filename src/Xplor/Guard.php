<?php namespace Xplor;

use Xplor\Robot;

class Guard {
    public const X_LIMIT_LOW = 0;
    public const X_LIMIT_HIGH = 4;
    public const Y_LIMIT_LOW = 0;
    public const Y_LIMIT_HIGH = 4;

    public static function assert(Robot $robot): bool {
        if ($robot->x < self::X_LIMIT_LOW) {
            return false;
        }

        if ($robot->y < self::Y_LIMIT_LOW) {
            return false;
        }

        if ($robot->x > self::X_LIMIT_HIGH) {
            return false;
        }

        if ($robot->y > self::Y_LIMIT_HIGH) {
            return false;
        }

        return in_array($robot->f, Robot::FACE_ORDER);
    }
}