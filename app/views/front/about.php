<?php

use \core\View;

foreach ( [ 'hero', 'content' ] as $file ) {
    View::rendertemplate('sections/about/'.$file, $data);
}

?>