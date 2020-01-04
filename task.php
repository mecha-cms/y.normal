<?php

if (null === State::get('x.scss')) {
    $debug = defined('DEBUG') && DEBUG;
    // Remove SCSS file(s) if necessary
    foreach (g(__DIR__, 'scss', true) as $k => $v) {
        // $debug ? test($k) : unlink($k);
    }
}
