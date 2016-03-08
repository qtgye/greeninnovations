App.createModule( 'SidebarToggle', (function (app) {
    


    var module = {};



    /**
     * Private variables
     */    
    
    var 

    $body   = $('body'),
    $toggle = $('.js-sidebar-toggle');




    /**
     * Private functions
     */
    
    function bindSidebarToggle () {
        
        $toggle.on('click',function (e) {
            
            e.preventDefault();
            $body.toggleClass('sidebar-visible');

        });

    }
    
    



    /**
     * API
     */



    /**
     * Init
     * @return void
     */
    module.init = function () {
        if ( $toggle.length ) {
            bindSidebarToggle();
        }
    };

    return module;
})(App));