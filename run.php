<?php

require_once __DIR__ . '/vendor/autoload.php';

if ($argc > 2) {
    $usage = <<<TXT
Usage: php run.php [filename]
TXT;
    print($usage);
    print(PHP_EOL);
    exit(1);
}

if ($argc > 1) {
    require('./src/file.php');

    $filepath = $argv[1];

    try {
        runFile(realpath($filepath));
    } catch (\Exception $e) {
        print($e->getMessage());
        print(PHP_EOL);
        exit(1);
    }

    exit(0);
}

require('./src/cli.php');

cli();

print(PHP_EOL);

exit(0);