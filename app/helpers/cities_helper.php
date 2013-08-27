<?php
function paintRow ($cities) {
$n = 1;
    foreach ($cities as $city) { ?>
        <tr id="<?php echo $city['_id']; ?>">
            <td><?php echo $n; ?></td>
            <td><?php echo $city['code']; ?></td>
            <td><?php echo $city['name']; ?></td>
            <td><?php echo utf8_encode($city['depart_id']);?></td>
            <td style="text-align: center;"><a onClick="showCity('<?php echo $city['_id']; ?>');">SHOW</a></td>
            <td style="text-align: center;"><a class="button-edit" onClick="editCity('<?php echo $city['_id']; ?>', '<?php echo $city['code']; ?>', '<?php echo utf8_encode($city['name']);?>', '<?php echo utf8_encode($city['depart_id']);?>');">EDIT</a></td>
            <td style="text-align: center;" ><a class="button-delete" onClick="if(confirm('Are you sure?')) {
                deleteCity('<?php echo $city['_id']; ?>'); 
            }">DELETE</a></td>
       </tr>
    <?php $n++;
    } 
}?>