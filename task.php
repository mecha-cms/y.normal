<?php

$debug = defined('DEBUG') && DEBUG;

if (empty($state->x->scss)) {
    // Remove SCSS file(s) if necessary
    foreach (g(__DIR__ . DS . 'asset', 'scss', true) as $k => $v) {
        $debug ? test('Delete: ' . $k) : unlink($k);
    }
    // Remove empty folder(s)
    foreach (g(__DIR__ . DS . 'asset', 0, true) as $k => $v) {
        if (0 === q(g($k))) {
            $debug ? test('Delete: ' . $k) : rmdir($k);
        }
    }
}

$debug ? test('Delete: ' . __FILE__) : unlink(__FILE__);
