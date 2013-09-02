<h4>Show City</h4>
<?php foreach ($collection as $tmp) { ?>
<label>CODE: </label>&nbsp;<?php echo $tmp['code']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $tmp['name']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $tmp['depart_id']; ?>
<br/>
<?php } ?>
<br/>
<a href="<?php echo Route::getUrlFor("cities", "edit", array("id" => $tmp['_id'], "code" => $tmp['code'], "name" => utf8_encode($tmp['name']), "depart_id" => utf8_encode($tmp['depart_id']) ) );?>">Edit</a>&nbsp;
<a href="<?php echo Route::getUrlFor("cities", "index"); ?>">Back</a>
