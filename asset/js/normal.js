/* Toggle Mobile Navigation */

(function(doc) {
    var base = doc.documentElement,
        toggle = doc.querySelector('.toggle');
    if (!toggle) return;
    function click(e) {
        this.classList.toggle('active');
        base.classList.toggle('is:aside-visible');
        base.scrollTop = 0;
        base.parentNode.scrollTop = 0;
        e.preventDefault();
    }
    toggle.addEventListener('click', click, false);
})(document);
