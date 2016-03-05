App.createModule( 'PdfSelect', (function (app) {
    
    var module = {};



    
    /**
     * Private variables
     */
    
    var

    $container = $('.js-pdf-input'),
    $text        = $container.find('.input-text'),
    $input       = $container.find('input[type="file"]'),
    $holder      = $container.find('.js-filename-holder'),

    currentValue;



    /**
     * Private functions
     */
    
    function bindPdfInput () {

        if ( !$container.length ) return;

        $input
        .on('change',function () {

            var file = $input[0].files[0];

            console.log($text.text());

            $container.toggleClass('has-file', ( $text.text() ? true : false));

            if ( !file ) return;

            if ( !file.name.match( /[.]pdf$/i ) ) {

                $container.addClass('has-error');

            } else {

                currentValue = file.name;
                $text.text(currentValue);

                $container
                .removeClass('has-error');               

            }

        })
        .trigger('change');

        $holder.on('change',function () {
            $text.text($holder.val())
        }).trigger('change')

    }




    /**
     * API
     */
    


    /**
     * Init
     * @return void
     */
    module.init = function () {
        bindPdfInput();
    };

    return module;
})(App));