<h4>Listing Countries</h4>
<label for="search">Search</label>&nbsp;<input type="text" id="search" name="SEARCH" size="50" placeholder="name" onkeyup="searchCountry('name', this.value);"/>
<br/><br/>
<div class="content-data">
    <?php 
        include Route::getViewPath("", "_flash"); 
        include Route::getViewPath("countries", "_countries"); 
    ?>
</div>
<br/>
<a href="<?php echo Route::getUrlFor("countries", "create"); ?>">New Country</a>