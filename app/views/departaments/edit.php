<?php

include Route::getViewPath("departaments", "_form");//'app/views/departaments/_form.php';

?>
<br/>
<a onClick="showDepartament('<?php echo $params['id']; ?>');">Show</a>&nbsp;
<a onClick="pathDepartament();">Back</a>