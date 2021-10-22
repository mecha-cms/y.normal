<?php

// Load widget state…
$GLOBALS['widget'] = (object) require __DIR__ . DS . 'state' . DS . 'widget.php';

// Create site link data to be used in navigation
$GLOBALS['links'] = new Anemon((static function($links, $state, $url) {
    $index = LOT . DS . 'page' . strtr($state->path, '/', DS) . '.page';
    foreach (g(LOT . DS . 'page', 'page') as $k => $v) {
        // Exclude home page
        if ($index === $k) {
            continue;
        }
        $v = new Page($k);
        // Add current state
        $v->current = 0 === strpos($url->path . '/', '/' . $v->name . '/');
        $links[$k] = $v;
    }
    ksort($links);
    return $links;
})([], $state, $url));

$z = defined('DEBUG') && DEBUG ? '.' : '.min.';
Asset::set('css/index' . $z . 'css', 20);
Asset::set('js/index' . $z . 'js', 20);

!State::get('path-blog') && State::set('path-blog', '/article');