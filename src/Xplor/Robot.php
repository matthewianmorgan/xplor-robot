<?php namespace Xplor;

final class Robot {
    public const FACE_NORTH = 'NORTH';
    public const FACE_SOUTH = 'SOUTH';
    public const FACE_EAST = 'EAST';
    public const FACE_WEST = 'WEST';

    public const FACE_ORDER = [
        self::FACE_NORTH,
        self::FACE_EAST,
        self::FACE_SOUTH,
        self::FACE_WEST,
    ];

    public $x;
    public $y;
    public $f;
}