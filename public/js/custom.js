function init(el) {
    window.teste = el
    $(el).addClass('show-loader')
    $(el).removeClass('hidden')
    setTimeout(() => {
        $(el).removeClass('show-loader')
        $(el).addClass('hidden')
    }, 1000)
}

$(document).ready(function() {
    init($('#loader'));
});
