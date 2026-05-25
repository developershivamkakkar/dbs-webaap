document.addEventListener('DOMContentLoaded', function () {
    const card = document.querySelector('.page-content-body');
    if (!card) return;

    // Strip CKEditor's default inline black color from th cells so white shows
    card.querySelectorAll('th').forEach(function (th) {
        const c = th.style.color;
        if (!c || c === 'rgb(0, 0, 0)' || c === 'hsl(0, 0%, 0%)' || c === '#000000' || c === 'black') {
            th.style.removeProperty('color');
        }
    });

    // 1. Strip hardcoded width/height attributes & inline styles from images
    card.querySelectorAll('img').forEach(function (img) {
        img.removeAttribute('width');
        img.removeAttribute('height');
        img.style.removeProperty('width');
        img.style.removeProperty('height');
    });

    // 2. Strip fixed width from CKEditor image wrappers (figure, .image_resized, span)
    card.querySelectorAll('.image_resized, figure, span[style]').forEach(function (el) {
        el.style.removeProperty('width');
        el.style.removeProperty('height');
        el.style.maxWidth = '100%';
    });

    // 3. Wrap every table in a scrollable div for mobile
    card.querySelectorAll('table').forEach(function (table) {
        if (!table.parentElement.classList.contains('table-responsive-wrap')) {
            const wrapper = document.createElement('div');
            wrapper.className = 'table-responsive-wrap';
            table.parentNode.insertBefore(wrapper, table);
            wrapper.appendChild(table);
        }
    });
});
