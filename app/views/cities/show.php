<h4>Show City</h4>
<?php foreach ($cities as $tmp) { ?>
<label>CODE: </label>&nbsp;<?php echo $tmp['code']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $tmp['name']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $tmp['depart_id']; ?>
<br/>
<?php } ?>
<br/>
<a onClick="editCity('<?php echo $tmp['_id']; ?>', '<?php echo $tmp['code']; ?>', '<?php echo utf8_encode($tmp['name']);?>', '<?php echo utf8_encode($tmp['depart_id']);?>');">Edit</a>&nbsp;
<a onClick="pathCity();">Back</a>
