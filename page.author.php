<?php

if (!empty($state->x->user) && $author instanceof User) {
    echo '<a href="' . ($author->link ?? $author->url) . '">' . $author . '</a>';
} else {
    echo '<span class="a">' . $author . '</span>';
}
