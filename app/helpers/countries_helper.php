<?php function paintRow($countries) {
    $n = 1;
    foreach ($countries as $country) { ?>
        <tr id="<?php echo $country['_id']; ?>">
            <td><?php echo $n; ?></td>
            <td><?php echo $country['code']; ?></td>
            <td><?php echo utf8_encode($country['name']);?></td>
            <td style="text-align: center;"><a href="<?php echo Route::getUrlFor("countries", "show", array("id" => $country['_id'])); ?>">SHOW</a></td>
            <td style="text-align: center;"><a class="button-edit" href="<?php echo Route::getUrlFor("countries", "edit", array("id" => $country['_id'], "code" => $country['code'], "name" => utf8_encode($country['name']) ) ); ?>">EDIT</a></td>
            <td style="text-align: center;" ><a class="button-delete" href="<?php echo Route::getUrlFor("countries", "delete", array("id" => $country['_id'])); ?>" onClick="if(!confirm('Are you sure?')) {
                return false;
            }">DELETE</a></td>
       </tr>
    <?php $n++;
    } 
} ?>