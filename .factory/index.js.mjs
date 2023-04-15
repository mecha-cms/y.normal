import {
    D,
    R,
    getElements,
    getParent,
    toggleClass
} from '@taufik-nurrohman/document';

import {
    offEventDefault,
    onEvent
} from '@taufik-nurrohman/event';

import {
    toCount
} from '@taufik-nurrohman/to';

const toggles = getElements('.toggle');

toCount(toggles) && toggles.forEach(toggle => {
    onEvent('click', toggle, function (e) {
        toggleClass(this, 'active');
        toggleClass(R, 'is:aside-visible');
        R.scrollTop = 0;
        getParent(R).scrollTop = 0;
        offEventDefault(e);
    });
});