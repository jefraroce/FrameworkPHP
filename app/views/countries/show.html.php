<h4>Show Country</h4>
<?php foreach ($countries as $tmp) { ?>
<label>CODE: </label>&nbsp;<?php echo $tmp['code']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $tmp['name']; ?>
<br/>
<?php } ?>
<br/>
<a onClick="editCountry('<?php echo $tmp['_id']; ?>', '<?php echo $tmp['code']; ?>', '<?php echo utf8_encode($tmp['name']);?>');">Edit</a>&nbsp;
<a onClick="pathCountry();">Back</a>
