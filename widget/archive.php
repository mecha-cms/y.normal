<?php

if (isset($state->x->archive)) {
    $archives = [];
    $archive_route = $state->x->archive->route ?? '/archive';
    $page_route = $route ?? $state->routeBlog;
    foreach (g(LOT . D . 'page' . $page_route, 'page') as $k => $v) {
        $p = new Page($k);
        $v = $p->time;
        if ($v) {
            $v = explode('-', $v);
            $archives[$v[0]][$v[1]][] = 1;
        }
    }
    $dates = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
    if ($site->is('archives')) {
        $current = $archive->format('Y-m');
    } else if ($site->is('page')) {
        $current = $page->time->format('Y-m');
    }
    krsort($archives);
    $content = "";
    foreach ($archives as $k => $v) {
        $k = (string) $k;
        if (!isset($current)) {
            $current = $k;
        }
        $content .= '<details class="archive' . (($open = $k === explode('-', $current)[0]) ? ' current' : "") . '"' . ($open ? ' open' : "") . '>';
        $content .= '<summary>';
        $content .= '<a href="' . $url . $page_route . $archive_route . '/' . $k . '/1">';
        $content .= $k;
        $content .= '</a> <span class="count">' . count($v) . '</span>';
        $content .= '</summary>';
        if (is_array($v)) {
            krsort($v);
            $content .= '<ul>';
            foreach ($v as $kk => $vv) {
                $content .= '<li' . ($k . '-' . $kk === $current ? ' class="current"' : "") . '>';
                $content .= '<a href="' . $url . $page_route . $archive_route . '/' . $k . '-' . $kk . '/1">';
                $content .= $k . ' ' . i($dates[((int) $kk) - 1]);
                $content .= '</a> <span class="count">' . count($vv) . '</span>';
                $content .= '</li>';
            }
            $content .= '</ul>';
        }
        $content .= '</details>';
    }
} else {
    $content = '<p role="status">' . i('Missing %s extension.', ['<a href="https://mecha-cms.com/store/extension/archive" target="_blank">archive</a>']) . '</p>';
}

echo self::widget([
    'title' => $title ?? i('Archives'),
    'content' => $content ?? '<p role="status">' . i('No %s yet.', ['posts']) . '</p>'
]);