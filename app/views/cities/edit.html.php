<?php

include Route::getViewPath("cities", "_form");//'app/views/cities/_form.php';

?>
<br/>
<a href="<?php echo Route::getUrlFor("cities", "show", array("id" => $params['id']) ); ?>">Show</a>&nbsp;
<a href="<?php echo Route::getUrlFor("cities", "index"); ?>">Back</a>