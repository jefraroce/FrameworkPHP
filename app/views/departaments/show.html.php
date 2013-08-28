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
<a href="<?php echo Route::getUrlFor("departaments", "edit", array("id" => $tmp['_id'], "code" => $tmp['code'], "name" => utf8_encode($tmp['name']), "country_id" => utf8_encode($tmp['country_id']) ) );?>">Edit</a>&nbsp;
<a href="<?php echo Route::getUrlFor("departaments", "index"); ?>">Back</a>
