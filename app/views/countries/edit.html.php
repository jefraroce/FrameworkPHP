<?php

include Route::getViewPath("countries", "_form");//'app/views/countries/_form.php';

?>
<br/>
<a href="<?php echo Route::getUrlFor("countries", "show", array("id" => $params['id'])); ?>">Show</a>&nbsp;
<a href="<?php echo Route::getUrlFor("countries", "index"); ?>">Back</a>