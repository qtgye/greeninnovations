<?php

use core\view;

if ( isset($data) ):

    View::rendertemplate('_header',$data);
    View::rendertemplate('_nav',$data);
    View::render('front/'.$page,$data);
    View::rendertemplate('_footer',$data);

endif;

?>