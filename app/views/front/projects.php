<?php

use \core\View;

foreach ( [ 'hero', 'projects' ] as $file ) {
    View::rendertemplate('sections/projects/'.$file, $data);
}

if ( !empty($projects) ) {
    foreach ($projects as $project) {
        if ( !empty($project->details) ):
        ?>
            <!-- project details modal -->
            <div class="modal fade" style="display:none" id="project_details_modal_<?= $project->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                        <button class="modal-corner-button top-right" data-dismiss="modal">
                            <span class="modal-corner-triangle"></span>
                            <i class="fa fa-times fa-lg"></i>
                        </button>

                        <div class="modal-header">
                            <h3 class="modal-title font-title"><?= $project->title ?></h3>
                            <!-- <p class="modal-subtitle font-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        </div>
                        <div class="modal-body">
                          <div class="col-xs-12">
                              <div class="panel">
                                  <div class="panel-body">
                                      <?= $project->details ?>
                                  </div>
                              </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>

        <?php
        endif;
    }
}

?>

