<?php

include Route::getViewPath("countries", "_form");//'app/views/countries/_form.php';

?>
<br/>
<a onClick="showCountry('<?php echo $params['id']; ?>');">Show</a>&nbsp;
<a onClick="pathCountry();">Back</a>