const items = $('.progress-bar-ajax');
items.each(function (index, el) {
    const item = $(el);
    const id = item.attr('id');
    const period = item.data('period');
    const url = item.data('url');
    const bar = item.find('.progress-bar');
    if (bar.attr('aria-valuenow') < 100) {
        const periodic = setInterval(function () {
            $.get(url, function (data) {
                bar.html(data.label).css('width', data.percent + '%');
                if (Number(data.percent) === 100) {
                    clearInterval(periodic);
                    bar.removeClass('progress-bar-animated progress-bar-striped');
                    if (typeof window[id + '_onDoneEvent'] !== "undefined") {
                        window[id + '_onDoneEvent'](data);
                    }
                }
                if (typeof window[id + '_onPeriodEvent'] !== "undefined") {
                    window[id + '_onPeriodEvent'](data);
                }
            });
        }, period);
    }
});