<h4>Listing Cities</h4>
<label for="search">Search</label>&nbsp;<input type="text" id="search" name="SEARCH" size="50" placeholder="name" onkeyup="searchCity('name', this.value);"/>
<br/><br/>
<div class="content-data">
    <?php 
        include Route::getViewPath("", "_flash"); 
        include Route::getViewPath("cities", "_cities"); 
    ?>
</div>
<br/>
<a href="<?php echo Route::getUrlFor("cities", "create"); ?>">New City</a>