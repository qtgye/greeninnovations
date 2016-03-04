<thead>
    <tr class="list-header">
        <!-- header -->
        <th class="">Title</th>
        <th class=""> Image</th>
        <th class=""></th>
    </tr>
</thead>
<?php foreach ($items as $key => $item): ?>
    <tr class="list-row" data-item-id="<?= $item->id ?>">    
        <td class="center-text wide"><?= $item->title ?></td>
        <td class="center-text">   
            <?php if ($item->image): ?>
                <img class="list-thumbnail js-zoomable" src="/uploads/<?= $item->image ?>" alt="">     
            <?php endif ?> 
        </td>
        <? $view->renderTemplate('partials/form-actions',[ 'model_name' => $model_name,  'item' => $item ]) ?>
    </tr> 
<?php endforeach ?>