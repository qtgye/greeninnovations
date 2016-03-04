<?php

use \core\View;

foreach ( [ 'slider', 'about-us', 'video', 'products' ] as $file ) {
    View::rendertemplate('sections/home/'.$file, $data);
}

?>