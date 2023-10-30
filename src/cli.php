<?php

use Xplor\Command;
use Xplor\Robot;

function cli() {
    $robot = new Robot();
    $command = new Command();

    while(true) {
        print('> ');
        $h = fopen('php://stdin', 'r');
        $o = trim(fgets($h));

        if ($o === 'quit') {
            break;
        }

        $robot = $command->execute($robot, $o);
    }

    fclose($h);
}