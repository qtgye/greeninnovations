<thead>
    <tr class="list-header">
        <th class="">Name</th>
        <th class="">Logo</th>
        <th class="">Website</th>
        <th class=""></th>
    </tr>
</thead>

<?php foreach ($items as $key => $item): ?>
<tr class="list-row" data-item-id="<?= $item->id ?>">    
    <td class="center-text wide"><?= $item->name ?></td>
    <td class="center-text wide">  
        <?php if ($item->image): ?>
            <img class="list-thumbnail js-zoomable" src="/uploads/<?= $item->image ?>" alt="">          
        <?php endif ?>      
    </td>
    <td class="center-text">
        <a href="<?= $item->url ?>" target="_blank"><?= trim(str_replace('http://','',$item->url), '/') ?></a>
    </td>
    <? $view->renderTemplate('partials/form-actions',[ 'model_name' => $model_name,  'item' => $item ]) ?>
</tr>   
<?php endforeach ?>