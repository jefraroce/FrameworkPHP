<?php
function paintRow ($cities) {
$n = 1;
    foreach ($cities as $city) { ?>
        <tr id="<?php echo $city['_id']; ?>">
            <td><?php echo $n; ?></td>
            <td><?php echo $city['code']; ?></td>
            <td><?php echo $city['name']; ?></td>
            <td><?php echo utf8_encode($city['depart_id']);?></td>
            <td style="text-align: center;"><a href="<?php echo Route::getUrlFor("cities", "show", array("id" => $city['_id']) ); ?>">SHOW</a></td>
            <td style="text-align: center;"><a class="button-edit" href="<?php echo Route::getUrlFor("cities", "edit", array("id" => $city['_id'], "code" => $city['code'], "name" => utf8_encode($city['name']), "depart_id" => $city['depart_id']) ); ?>">EDIT</a></td>
            <td style="text-align: center;" ><a class="button-delete" href="<?php echo Route::getUrlFor("cities", "delete", array("id" => $city['_id'])); ?>" onClick="if(!confirm('Are you sure?')) {
                return false;
            }">DELETE</a></td>
       </tr>
    <?php $n++;
    } 
}

function paintObjectXml ($cities) {
$n = 1;
    foreach ($cities as $city) { ?>
        <city id="<?php echo $city['_id']; ?>">
            <order><?php echo $n; ?></order>
            <code><?php echo $city['code']; ?></code>
            <name><?php echo $city['name']; ?></name>
            <depart_id><?php echo utf8_encode($city['depart_id']);?></depart_id>
       </city>
    <?php $n++;
    } 
}