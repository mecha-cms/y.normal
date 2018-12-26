<?php

if (Extend::exist('tag')) {
    call_user_func(function() {
        extract(Lot::get());
        $page = $lot['page'] ?? null;
        $tags = $page->tags->map(function($tag) {
            return HTML::a($tag->title, $tag->url, false, ['rel' => 'tag']);
        });
        $title = $language->{$tags->count === 1 ? 'tag' : 'tags'};
        echo $tags->count ? $title . ': ' . $tags : "";
    });
}