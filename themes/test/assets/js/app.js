(function($){

    $('#formFilter').on('change', 'input, select', function(){
        console.log('aaa')
        var $form = $(this).closest('form');
        $('form').request();
    });

})(jQuery);
