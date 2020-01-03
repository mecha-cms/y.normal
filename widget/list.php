<?php

if (!empty($list)) {
    $content = '<ul>';
    foreach ($list as $v) {
        $content .= '<li>' . $v . '</li>';
    }
    $content .= '</ul>';
}

echo self::widget([
    'id' => 'list' . (isset($id) ? '-' . $id : ""),
    'title' => $title ?? null,
    'content' => $content ?? null
]);