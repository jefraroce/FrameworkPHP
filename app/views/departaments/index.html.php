<h4>Listing Departaments</h4>
<label for="search">Search</label>&nbsp;<input type="text" id="search" name="SEARCH" size="50" placeholder="name" onkeyup="searchDepartament('name', this.value);"/>
<br/><br/>
<div class="content-data">
    <?php include Route::getViewPath("departaments", "_departaments"); ?>
</div>
<br/>
<a href="<?php echo Route::getUrlFor("departaments", "create"); ?>">New Departament</a>