<?php

include Route::getViewPath("cities", "_form");//'app/views/cities/_form.php';

?>
<br/>
<a onClick="showCity('<?php echo $params['id']; ?>');">Show</a>&nbsp;
<a onClick="pathCity();">Back</a>