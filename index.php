<?php

// Wrap description data with paragraph tag(s) if needed
Hook::set('page.description', function($description) {
    if ($description && false === strpos($description, '</p>')) {
        return '<p>' . strtr(trim(n($description)), [
            "\n\n" => '</p><p>',
            "\n" => '<br>'
        ]) . '</p>';
    }
    return $description;
});

// Load widget state…
$GLOBALS['widget'] = (object) require __DIR__ . DS . 'state' . DS . 'widget.php';

// Set custom language phrase
$GLOBALS['I']['Search...'] = 'Search…';

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

// Create site trace data to be used in navigation
$GLOBALS['traces'] = new Pages((function($out, $state, $url) {
    $chops = explode('/', trim($url->path, '/'));
    $v = LOT . DS . 'page';
    while ($chop = array_shift($chops)) {
        $v .= '/' . $chop;
        if ($file = File::exist([
            $v . '.page',
            $v . '.archive'
        ])) {
            $out[] = $file;
        }
    }
    return $out;
})([], $state, $url));

// Load asset(s)
Asset::set($url->protocol . 'maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', 20);
if (null !== State::get('x.scss')) {
    Asset::set(__DIR__ . DS . 'asset' . DS . 'scss' . DS . 'normal.scss', 20);
} else {
    Asset::set(__DIR__ . DS . 'asset' . DS . 'css' . DS . 'normal.min.css', 20);
}
Asset::set('js/normal.min.js', 20);
