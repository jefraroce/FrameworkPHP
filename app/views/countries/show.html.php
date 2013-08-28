<h4>Show Country</h4>
<?php foreach ($countries as $tmp) { ?>
<label>CODE: </label>&nbsp;<?php echo $tmp['code']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $tmp['name']; ?>
<br/>
<?php } ?>
<br/>
<a href="<?php echo Route::getUrlFor("countries", "edit", array("id" => $tmp['_id'], "code" => $tmp['code'], "name" => utf8_encode($tmp['name']) ) ); ?>">Edit</a>&nbsp;
<a href="<?php echo Route::getUrlFor("countries", "index"); ?>">Back</a>
