<?php
function paintRow ($departaments) {
$n = 1;
    foreach ($departaments as $departament) { ?>
        <tr id="<?php echo $departament['_id']; ?>">
            <td><?php echo $n; ?></td>
            <td><?php echo $departament['code']; ?></td>
            <td><?php echo $departament['name']; ?></td>
            <td><?php echo utf8_encode($departament['country_id']);?></td>
            <td style="text-align: center;"><a href="?controller=departaments&action=show&id=<?php echo $departament['_id']; ?>">SHOW</a></td>
            <td style="text-align: center;"><a class="button-edit" onClick="editDepartament('<?php echo $departament['_id']; ?>', '<?php echo $departament['code']; ?>', '<?php echo utf8_encode($departament['name']);?>', '<?php echo utf8_encode($departament['country_id']);?>');">EDIT</a></td>
            <td style="text-align: center;" ><a class="button-delete" onClick="if(confirm('Are you sure?')) {
                deleteDepartament('<?php echo $departament['_id']; ?>'); 
            }">DELETE</a></td>
       </tr>
    <?php $n++;
    } 
}?>