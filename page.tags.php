<?php

if (null !== State::get('x.tag')) {
    $tags = $tags->map(function($tag) {
        if (is_string($tag)) {
            $tag = new Tag($tag);
        }
        return '<a href="' . $tag->url . '" rel="tag">' . $tag->title . '</a>';
    });
    echo $tags->count ? i('Tagged in %s', [(string) $tags]) : "";
}
