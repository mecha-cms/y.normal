(function() {
    'use strict';
    let doc = document,
        base = doc.documentElement,
        toggle = doc.querySelector('.toggle');

    function onClick(e) {
        this.classList.toggle('active');
        base.classList.toggle('is:aside-visible');
        base.scrollTop = 0;
        base.parentNode.scrollTop = 0;
        e.preventDefault();
    }
    toggle && toggle.addEventListener('click', onClick, false);
})();