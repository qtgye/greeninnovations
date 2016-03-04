<?php

use \core\View;

foreach ( [ 'hero', 'projects' ] as $file ) {
    View::rendertemplate('sections/projects/'.$file, $data);
}

?>