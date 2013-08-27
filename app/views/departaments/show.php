<h4>Show Departament</h4>
<?php foreach ($departaments as $tmp) { ?>
<label>CODE: </label>&nbsp;<?php echo $tmp['code']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $tmp['name']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $tmp['country_id']; ?>
<br/>
<?php } ?>
<br/>
<a onClick="editDepartament('<?php echo $tmp['_id']; ?>', '<?php echo $tmp['code']; ?>', '<?php echo utf8_encode($tmp['name']);?>', '<?php echo utf8_encode($tmp['country_id']);?>');">Edit</a>&nbsp;
<a href="?controller=departaments&action=index">Back</a>
