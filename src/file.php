<?php

use Xplor\Command;
use Xplor\Robot;

function runFile($filename) {
    $robot = new Robot();
    $command = new Command();

    if (!file_exists($filename)) {
        throw new \Exception('File Not Found');
    }

    $file = new SplFileObject($filename);
    foreach ($file as $o) {
        $robot = $command->execute($robot, trim($o));
    }
}