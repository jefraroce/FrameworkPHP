<h4>Listing Departaments</h4>
<label for="search">Search</label>&nbsp;<input type="text" id="search" name="SEARCH" size="50" placeholder="name" onkeyup="searchDepartament('name', this.value);"/>
<br/><br/>
<div class="content-data">
    <table>
        <thead>
        <tr>
            <th>No.</th>
            <th>CODE</th>
            <th>NAME</th>
            <th>COUNTRY</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="departaments-list">
            <?php paintRow($departaments); ?>
        </tbody>
    </table>
</div>
<br/>
<button onClick="location.href = '<?php echo Route::getUrlFor("departaments", "create"); ?>'; ">New Departament</button>