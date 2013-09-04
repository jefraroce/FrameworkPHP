<?php
function paintRow ($departaments) {
$n = 1;
    foreach ($departaments as $departament) { ?>
        <tr id="<?php echo $departament['_id']; ?>">
            <td><?php echo $n; ?></td>
            <td><?php echo $departament['code']; ?></td>
            <td><?php echo $departament['name']; ?></td>
            <td><?php echo utf8_encode($departament['country_id']);?></td>
            <td style="text-align: center;"><a href="<?php echo Route::getUrlFor("departaments", "show", array("id" => $departament['_id']) ); ?>">SHOW</a></td>
            <td style="text-align: center;"><a class="button-edit" href="<?php echo Route::getUrlFor("departaments", "edit", array("id" => $departament['_id'], "code" => $departament['code'], "name" => utf8_encode($departament['name']), "country_id" => utf8_encode($departament['country_id']) ) );?>">EDIT</a></td>
            <td style="text-align: center;" ><a class="button-delete" href="<?php echo Route::getUrlFor("departaments", "delete", array("id" => $departament['_id'])); ?>" onClick="if(!confirm('Are you sure?')) {
                return false;
            }">DELETE</a></td>
       </tr>
    <?php $n++;
    } 
}

function paintObjectXml ($departaments) {
$n = 1;
    foreach ($departaments as $departament) { ?>
        <departament id="<?php echo $departament['_id']; ?>">
            <order><?php echo $n; ?></order>
            <code><?php echo $departament['code']; ?></code>
            <name><?php echo $departament['name']; ?></name>
            <country_id><?php echo $departament['country_id']; ?></country_id>
       </departament>
    <?php $n++;
    } 
}