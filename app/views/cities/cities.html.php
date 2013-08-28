<h4>Listing Cities</h4>
<label for="search">Search</label>&nbsp;<input type="text" id="search" name="SEARCH" size="50" placeholder="name" onkeyup="searchCity('name', this.value);"/>
<br/><br/>
<div class="content-data">
    <table>
        <thead>
        <tr>
            <th>No.</th>
            <th>CODE</th>
            <th>NAME</th>
            <th>DEPARTAMENT</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="cities-list">
            <?php paintRow($cities); ?>
        </tbody>
    </table>
</div>
<br/>
<button onClick="location.href = '<?php echo Route::getUrlFor("cities", "create"); ?>'; ">New City</button>