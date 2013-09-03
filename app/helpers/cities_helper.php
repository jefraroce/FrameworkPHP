<?php
function paintRow ($cities, $xml = false) {
$n = 1;
    foreach ($cities as $city) { ?>
        <tr id="<?php echo $city['_id']; ?>">
            <td><?php echo $n; ?></td>
            <td><?php echo $city['code']; ?></td>
            <td><?php echo $city['name']; ?></td>
            <td><?php echo utf8_encode($city['depart_id']);?></td>
            <?php if(!$xml) { ?>
            <td style="text-align: center;"><a href="<?php echo Route::getUrlFor("cities", "show", array("id" => $city['_id']) ); ?>">SHOW</a></td>
            <td style="text-align: center;"><a class="button-edit" href="<?php echo Route::getUrlFor("cities", "edit", array("id" => $city['_id'], "code" => $city['code'], "name" => utf8_encode($city['name']), "depart_id" => $city['depart_id']) ); ?>">EDIT</a></td>
            <td style="text-align: center;" ><a class="button-delete" href="<?php echo Route::getUrlFor("cities", "delete", array("id" => $city['_id'])); ?>" onClick="if(!confirm('Are you sure?')) {
                return false;
            }">DELETE</a></td>
            <?php } ?>
       </tr>
    <?php $n++;
    } 
}?>