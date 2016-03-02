<?php

use core\view;

if ( isset($data) ) {
    
    View::rendertemplate('admin/_header',$data);
    View::rendertemplate('admin/_sidebar',$data);

    View::render('admin/' . $data['page'],$data);

    View::rendertemplate('admin/_footer',$data);
}



?>