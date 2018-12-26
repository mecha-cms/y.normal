<?php

extract($lot);
if (Extend::exist('user') && $page->author instanceof User) {
    echo HTML::a($page->author . "", $page->author->link ?: $page->author->url);
} else {
    echo HTML::span($page->author . "", ['class[]' => ['a']]);
}