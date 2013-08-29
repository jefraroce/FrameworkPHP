<form action="index" method="post" id="departament_form">
    <h3>DEPARTAMENTS</h3>
    <input type="hidden" id="action" name="action" value="<?php echo (isset($params['id']) ? "update" : "insert" ); ?>" class="required" />
    <input type="hidden" id="controller" name="controller" value="departaments" />
    <input type="hidden" id="id" name="id" value="<?php echo (isset($params['id']) ? $params['id'] : "" ); ?>" />
    <label for="code">CODE</label>&nbsp;
    <input type="number" id="code" name="code" min="1" maxlength="2" size="4" placeholder="code" style="text-transform: uppercase;" value="<?php echo (isset($params['code']) ? $params['code'] : "" ); ?>" class="required" />
    <br/><br/>
    <label for="name">NAME</label>&nbsp;<input type="text" id="name" name="name" size="50" placeholder="name" value="<?php echo (isset($params['name']) ? $params['name'] : "" ); ?>" class="required"  />
    <br/><br/>
    <label for="name">COUNTRY</label>&nbsp;<select id="country_id" name="country_id">
    <?php foreach ($countries as $country) {
        $sel = "";
        if(isset($params['country_id']) && $params['country_id'] == $country['code'])
            $sel = "selected";
        echo "<option value='".$country['code']."' $sel >".$country['name']."</option>";
    }?>
    </select>
    <br/><br/>
    <input type="submit" value="SAVE" />
    <br/>
    <div id="response-data"></div>
</form>