<h4>Listing Countries</h4>
<label for="search">Search</label>&nbsp;<input type="text" id="search" name="SEARCH" size="50" placeholder="name" onkeyup="searchCountry('name', this.value);"/>
<br/><br/>
<div class="content-data">
    <table>
        <thead>
        <tr>
            <th>No.</th>
            <th>CODE</th>
            <th>NAME</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="countries-list">
            <?php paintRow($countries); ?>
        </tbody>
    </table>
</div>
<br/>
<button onClick="location.href = '<?php echo Route::getUrlFor("countries", "create"); ?>';">New Country</button>