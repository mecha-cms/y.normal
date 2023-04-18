<?php

$GLOBALS['links'] = new Anemone((static function ($links, $state, $url) {
    $index = LOT . D . 'page' . D . trim(strtr($state->route, '/', D), D) . '.page';
    $path = $url->path . '/';
    foreach (g(LOT . D . 'page', 'page') as $k => $v) {
        // Exclude home page
        if ($k === $index) {
            continue;
        }
        $v = new Page($k);
        // Add current state
        $v->current = 0 === strpos($path, '/' . $v->name . '/');
        $links[$k] = $v;
    }
    ksort($links);
    return $links;
})([], $state, $url));

$z = defined('TEST') && TEST ? '.' : '.min.';
Asset::set(__DIR__ . D . 'index' . $z . 'css', 20);
Asset::set(__DIR__ . D . 'index' . $z . 'js', 20);

State::set('widget', require __DIR__ . D . 'state' . D . 'widget.php');

$defaults = [
    'route-blog' => '/article',
    'x.comment.page.type' => 'Markdown',
    'x.page.page.chunk' => 14,
    'x.page.page.sort' => [1, 'time'],
    'x.page.page.type' => 'Markdown'
];

foreach ($defaults as $k => $v) {
    !State::get($k) && State::set($k, $v);
}

if (isset($state->x->alert)) {
    Hook::set('y.alert', function ($alert) {
        foreach ($alert[1] as &$v) {
            if (!$name = $v[2]['type'] ?? $v['type'] ?? "") {
                continue;
            }
            if (isset($v[2]['class'])) {
                $v[2]['class'] .= ' ' . $name;
            } else {
                $v[2]['class'] = $name;
            }
        }
        unset($v);
        return $alert;
    });
}

if (isset($state->x->pass)) {
    // Add legacy form class name
    Hook::set('y.form.pass', function ($y) {
        $suffix = ':' . (Is::user() ? 'exit' : 'enter');
        if (isset($y[2]['class'])) {
            $y[2]['class'] .= ' form-pass form-pass' . $suffix;
        } else {
            $y[2]['class'] = 'form-pass form-pass' . $suffix;
        }
        return $y;
    });
}

if (isset($state->x->user)) {
    // Add legacy form class name
    Hook::set('y.form.user', function ($y) {
        $suffix = ':' . (Is::user() ? 'exit' : 'enter');
        if (isset($y[2]['class'])) {
            $y[2]['class'] .= ' form-user form-user' . $suffix;
        } else {
            $y[2]['class'] = 'form-user form-user' . $suffix;
        }
        return $y;
    });
}