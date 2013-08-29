<form action="index" method="post" id="city_form">
    <h3>CITIES</h3>
    <input type="hidden" id="action" name="action" value="<?php echo (isset($params['id']) ? "update" : "insert" ); ?>" class="required" />
    <input type="hidden" id="controller" name="controller" value="cities" />
    <input type="hidden" id="id" name="id" value="<?php echo (isset($params['id']) ? $params['id'] : "" ); ?>" />
    <label for="code">CODE</label>&nbsp;
    <input type="number" id="code" name="code" min="1" size="6" placeholder="code" value="<?php echo (isset($params['code']) ? $params['code'] : "" ); ?>" class="required" />
    <br/><br/>
    <label for="name">NAME</label>&nbsp;<input type="text" id="name" name="name" size="50" placeholder="name" value="<?php echo (isset($params['name']) ? $params['name'] : "" ); ?>" class="required"  />
    <br/><br/>
    <label for="name">DEPARTAMENT</label>&nbsp;<select id="depart_id" name="depart_id">
    <?php foreach ($departaments as $departament) {
        $sel = "";
        if(isset($params['depart_id']) && $params['depart_id'] == $departament['code'])
            $sel = "selected";
        echo "<option value='".$departament['code']."' $sel >".$departament['name']."</option>";
    }?>
    </select>
    <br/><br/>
    <input type="submit" value="SAVE" />
    <br/>
    <div id="response-data"></div>
</form>