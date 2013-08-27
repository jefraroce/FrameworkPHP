<?php $n = 1;
    foreach ($countries as $country) { ?>
        <tr id="<?php echo $country['_id']; ?>">
            <td><?php echo $n; ?></td>
            <td><?php echo $country['code']; ?></td>
            <td><?php echo utf8_encode($country['name']);?></td>
            <td style="text-align: center;"><a href="?controller=countries&action=show&id=<?php echo $country['_id']; ?>">SHOW</a></td>
            <td style="text-align: center;"><a class="button-edit" onClick="editCountry('<?php echo $country['_id']; ?>', '<?php echo $country['code']; ?>', '<?php echo utf8_encode($country['name']);?>');">EDIT</a></td>
            <td style="text-align: center;" ><a class="button-delete" onClick="if(confirm('Are you sure?')) {
                deleteCountry('<?php echo $country['_id']; ?>'); 
            }">DELETE</a></td>
       </tr>
    <?php $n++;
    } ?>