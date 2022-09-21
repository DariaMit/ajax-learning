// initLoadMore();
// function initLoadMore() {
//     document.querySelectorAll('.button-class').forEach((button) => {
//         button.addEventListener('click', (event) => {
//             event.preventDefault();
//             let nextPage = button.getAttribute('data-page');
//             oc.ajax('onAjax', {
//                 data: {
//                     'page': nextPage
//                 },
//                 update: {
//                     'elements/educationalScheduleList': '@#scheduleListWrap',
//                     'elements/scheduleLoadMore': '#scheduleLoadMoreWrap',
//                 },
//                 complete: () => initLoadMore()
//             })
//         });
//     })
// }
//
// (function($){
//
//     $('#moreItems').on('click', function(){
//         console.log('click!!!!!!!')
//         var $form = $(this).closest('form');
//         $('form').request();
//     });
//
// })(jQuery);


initLoadMore();
function initLoadMore() {
    document.querySelectorAll('.button-class').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            let nextPage = button.getAttribute('data-page');
            console.log(nextPage);
            console.log('mew');
            oc.ajax('onAjax', {
                data: {
                    'page': nextPage
                },
                update: {
                    'test/hello': '@#hi',
                    'test/buttonMore': '#buttonMore',
                },
                complete: () => initLoadMore()
            })
        });
    })
}
