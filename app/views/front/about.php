<?php

use \core\View;

foreach ( [ 'hero', 'content', 'partners' ] as $file ) {
    View::rendertemplate('sections/about/'.$file, $data);
}

?>