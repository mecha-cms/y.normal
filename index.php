<?php namespace y\normal;

\lot('links', new \Anemone(\fire(function ($r) use ($state) {
    $route_current = $this->path . '/';
    $route_r = '/' . \trim($state->route ?? 'index', '/');
    foreach (\g(\LOT . \D . 'page', 'page') as $k => $v) {
        $v = new \Page($k);
        // Exclude home page
        if ($route_r === ($route = $v->route)) {
            continue;
        }
        // Add current state
        $v->current = 0 === \strpos($route_current, $route . '/');
        $r[$v->title . \P . $k] = $v;
    }
    \ksort($r);
    return \array_values($r);
}, [[]], $url)));

$z = \defined("\\TEST") && \TEST ? '.' : '.min.';

\Asset::set(__DIR__ . \D . 'index' . $z . 'css', 20);
\Asset::set(__DIR__ . \D . 'index' . $z . 'js', 20);

\State::set('widget', require __DIR__ . \D . 'state' . \D . 'widget.php');

$states = [
    'route-blog' => '/article',
    'x.comment.page.type' => isset($state->x->comment) ? 'Markdown' : null,
    'x.page.page.chunk' => isset($state->x->page) ? 14 : null,
    'x.page.page.sort' => isset($state->x->page) ? [1, 'time'] : null,
    'x.page.page.type' => isset($state->x->page) ? 'Markdown' : null
];

foreach ($states as $k => $v) {
    !\State::get($k) && null !== $v && \State::set($k, $v);
}

if (isset($state->x->alert)) {
    \Hook::set('y.alert', function ($y) {
        foreach ($y[1] as &$v) {
            if (!$n = $v[2]['type'] ?? $v['type'] ?? "") {
                continue;
            }
            if (isset($v[2]['class'])) {
                $v[2]['class'] .= ' ' . $n;
            } else {
                $v[2]['class'] = $n;
            }
        }
        unset($v);
        return $y;
    });
}

if (isset($state->x->excerpt) && $state->is('page')) {
    \Hook::set('page.content', function ($content) {
        return null !== $content ? \strtr($content, ["\f" => '<span id="next:' . $this->id . '" role="doc-pagebreak"></span>']) : null;
    });
}

if (isset($state->x->pass)) {
    // Add legacy form class name
    \Hook::set('y.form.pass', function ($y) use ($state) {
        $suffix = '-' . ($state->has('user') ? 'exit' : 'enter');
        if (isset($y[2]['class'])) {
            $y[2]['class'] .= ' form-pass form-pass' . $suffix;
        } else {
            $y[2]['class'] = 'form-pass form-pass' . $suffix;
        }
        return $y;
    });
}

if (isset($state->x->search)) {
    \Hook::set('y.form.search', function ($y) {
        $y[1]['search'][1]['button'][1] = '<span class="sr">' . \i('Search') . '</span>';
        $y[2]['class'] = 'form-search';
        return $y;
    });
}

if (isset($state->x->user)) {
    // Add legacy form class name
    \Hook::set('y.form.user', function ($y) use ($state) {
        $suffix = '-' . ($state->has('user') ? 'exit' : 'enter');
        if (isset($y[2]['class'])) {
            $y[2]['class'] .= ' form-user form-user' . $suffix;
        } else {
            $y[2]['class'] = 'form-user form-user' . $suffix;
        }
        return $y;
    });
}