<?php

if (isset($state->x->user) && $author instanceof User) {
    echo '<a href="' . eat($author->link ?? $author->url) . '" rel="author">' . $author . '</a>';
} else {
    echo '<span class="a">' . $author . '</span>';
}