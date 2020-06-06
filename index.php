<?php

// Load widget state…
$GLOBALS['widget'] = (object) require __DIR__ . DS . 'state' . DS . 'widget.php';

// Create site link data to be used in navigation
$GLOBALS['links'] = new Anemon((function($out, $state, $url) {
    $index = LOT . DS . 'page' . strtr($state->path, '/', DS) . '.page';
    foreach (g(LOT . DS . 'page', 'page') as $k => $v) {
        // Exclude home page
        if ($k === $index) {
            continue;
        }
        $v = new Page($k);
        // Add active state
        $v->set('active', 0 === strpos($url->path . '/', '/' . $v->name . '/'));
        $out[$k] = $v;
    }
    ksort($out);
    return $out;
})([], $state, $url));

// Load asset(s)
Asset::set($url->protocol . 'maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', 20);
if (null !== State::get('x.scss')) {
    Asset::set('scss/normal.scss', 20);
} else {
    Asset::set('css/normal.min.css', 20);
}
Asset::set('js/normal.min.js', 20);
