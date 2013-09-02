<h4>Show Country</h4>
<?php foreach ($collection as $country) { ?>
<label>CODE: </label>&nbsp;<?php echo $country['code']; ?>
<br/>
<label>NAME: </label>&nbsp;<?php echo $country['name']; ?>
<br/>
<?php } ?>
<br/>
<a href="<?php echo Route::getUrlFor("countries", "edit", array("id" => $country['_id'], "code" => $country['code'], "name" => utf8_encode($country['name']) ) ); ?>">Edit</a>&nbsp;
<a href="<?php echo Route::getUrlFor("countries", "index"); ?>">Back</a>