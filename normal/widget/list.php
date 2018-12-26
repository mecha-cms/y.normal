<?php

extract($lot);

static::widget([
    'id' => 'list' . (isset($id) ? '-' . $id : ""),
    'title' => $title ?? null,
    'content' => !empty($list) ? HTML::ul($list) : ($content ?? null)
]);