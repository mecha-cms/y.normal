(function () {
    'use strict';
    var toCount = function toCount(x) {
        return x.length;
    };

    function _toArray(iterable) {
        return Array.from(iterable);
    }
    var D = document;
    var R = D.documentElement;
    var getElements = function getElements(query, scope) {
        return _toArray((D).querySelectorAll(query));
    };
    var getParent = function getParent(node, query) {
        return node.parentNode || null;
    };
    var toggleClass = function toggleClass(node, name, force) {
        return node.classList.toggle(name, force), node;
    };
    var offEventDefault = function offEventDefault(e) {
        return e && e.preventDefault();
    };
    var onEvent = function onEvent(name, node, then, options) {
        if (options === void 0) {
            options = false;
        }
        node.addEventListener(name, then, options);
    };
    var toggles = getElements('.toggle');
    toCount(toggles) && toggles.forEach(function (toggle) {
        onEvent('click', toggle, function (e) {
            toggleClass(this, 'active');
            toggleClass(R, 'is:aside-visible');
            R.scrollTop = 0;
            getParent(R).scrollTop = 0;
            offEventDefault(e);
        });
    });
})();