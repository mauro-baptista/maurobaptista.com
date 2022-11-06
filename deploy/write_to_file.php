#!/usr/bin/env php

<?php

if (!isset($argv[1])) {
    echo 'No data set';
    return 1;
}

if (!isset($argv[2])) {
    echo 'No filename set';
    return 1;
}

$parameter = json_decode($argv[1], true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Invalid Json';
    return 1;
}

if (!isset($parameter['Parameter'])) {
    echo 'No parameters index found';
    return 1;
}

file_put_contents($argv[2], $parameter['Parameter']['Value']);

return 0;
