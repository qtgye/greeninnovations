<?php

use \core\View;

foreach ( [ 'slider', 'about-us', 'services', 'products', 'news' ] as $file ) {
    View::rendertemplate('sections/home/'.$file, $data);
}

?>