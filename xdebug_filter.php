<?php
if (function_exists('xdebug_set_filter')) {
    xdebug_set_filter(
        XDEBUG_FILTER_CODE_COVERAGE,
        XDEBUG_PATH_INCLUDE,
        [ __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR ]
    );
    xdebug_set_filter(
        XDEBUG_FILTER_CODE_COVERAGE,
        XDEBUG_PATH_EXCLUDE,
        [ __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR ]
    );
}
