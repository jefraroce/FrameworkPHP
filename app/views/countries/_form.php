<script type="text/javascript">
     $(document).ready(function() {
        $("#country_form").validate();
     });
</script>
<form action="index" method="post" id="country_form">
    <h3>COUNTRIES</h3>
    <input type="hidden" id="action" name="action" value="<?php echo (isset($params['id']) ? "update" : "insert" ); ?>" class="required" />
    <input type="hidden" id="controller" name="controller" value="countries" />
    <input type="hidden" id="id" name="id" value="<?php echo (isset($params['id']) ? $params['id'] : "" ); ?>" />
    <label for="code">CODE</label>&nbsp;
    <input type="text" id="code" name="code" maxlength="2" size="4" placeholder="code" style="text-transform: uppercase;" value="<?php echo (isset($params['code']) ? $params['code'] : "" ); ?>" class="required" />
    &nbsp;&nbsp;
    <label for="name">NAME</label>&nbsp;<input type="text" id="name" name="name" size="50" placeholder="name" value="<?php echo (isset($params['name']) ? $params['name'] : "" ); ?>" class="required"  />
    &nbsp;&nbsp;
    <input type="submit" value="SAVE" />
    <br/>
    <div id="response-data"></div>
</form>