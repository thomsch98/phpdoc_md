#!/usr/bin/env php
<?php

for ($dir = __DIR__; ; $dir = dirname($dir)) {
    if (empty($dir)) {
        die("No composer 'vendor/autoload.php' found.");
    }
    if (file_exists($dir . '/vendor/autoload.php')) {
        require_once $dir . '/vendor/autoload.php';
        break;
    }
}

$script = basename(__FILE__);
$optend = -1;
$options = getopt('n:s:t:h', ['help'], $optend);
if ($options == false
    || isset($options['h'])
    || isset($options['help'])
    || empty($options['n'])
    || empty($options['s'])
    || empty($options['t'])
) {
    echo <<<EOT
usage: {$script} [options]

-n <string>         (Required) Namespace to document
-s <string>         (Required) Directory to scan for sources
-t <string>         (Required) Output directory
-h|--help           This text

EOT;
    exit(0);
}

$namespace = $options['n'];
$srcDir = $options['s'];
$tgtDir = $options['t'];

(new \alphayax\mdGen\MdGen($srcDir, $namespace))
    ->generate($tgtDir);
