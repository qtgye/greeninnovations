<!-- sidebar start-->
  <aside class="clearfix">
      <div id="sidebar"  class="n">

          <!-- sidebar menu start-->
            <ul class="sidebar-nav">     

                <li class="sidebar-item <?= ( $page == 'info' ? 'active' : '' ) ?>">
                  <a class="sidebar-link" href="/admin/info" class="">
                      <!-- <i class="icon_document_alt"></i> -->
                      <span>Site Info</span>
                  </a>
                </li>     
                    
                <!-- CONTROLLER PAGES -->        
                <?php if ( isset($data['resourced_models']) ): ?>
                    <?php foreach ($data['resourced_models'] as $model_name => $title): ?>
                        <li class="sidebar-item <?= ( $page == $model_name ? 'active' : '' ) ?>">
                            <a class="sidebar-link" href="/admin/<?=$model_name?>">
                                <!-- <i class="icon_document_alt"></i> -->
                                <span><?= $title ?></span>
                            </a>
                            <a class="animated-cross" href="/admin/<?=$model_name?>/new" class="animated-cross"></a>
                        </li>
                    <?php endforeach ?>  
                <?php endif ?>

            </ul>

            <!-- page modules nav -->
            <div class="sidebar-header">
              <h5><em>Page Modules</em></h3>
            </div>
            <ul class="sidebar-nav page-modules-nav">
            <?php

            $pages = [
              'home' => 'Home'
            ];

            foreach ($pages as $page => $title):
              ?>

                <li class="sidebar-item <?= ( $page == 'info' ? 'active' : '' ) ?>">
                  <a class="sidebar-link" href="/admin/page/<?= $page ?>" class="">
                      <span><?= $title ?></span>
                  </a>
                </li>   
              
              <?php
              endforeach
            ?>  
            </ul>
            

          

          <!-- sidebar menu end-->
      </div>
  </aside>
  <!--sidebar end