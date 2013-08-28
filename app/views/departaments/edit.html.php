<?php

include Route::getViewPath("departaments", "_form");//'app/views/departaments/_form.php';

?>
<br/>
<a href="<?php echo Route::getUrlFor("departaments", "show", array("id" => $params['id']) ); ?>">Show</a>&nbsp;
<a href="<?php echo Route::getUrlFor("departaments", "index"); ?>">Back</a>