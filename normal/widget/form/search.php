<?php

call_user_func(function() {
    extract(Lot::get());
    $q = $config->q;
    $content = '<form class="form-search" action="' . $url . '/' . $widget->page['path'] . '" method="get">';
    $content .= Form::text($q, HTTP::get($q), $language->search . '…', ['class[]' => ['input']]);
    $content .= Form::submit(null, null, "", ['class[]' => ['button']]);
    $content .= '</form>';
    $id = To::slug(Path::N(__FILE__));
    static::widget([
        'id' => 'form-search',
        'content' => $content
    ]);
});

?>