    
    $(document).ready(function() {
        $("#city_form").validate();
     });

    function searchCity(key, value) {
        renderQuery('.content-data', 'index.php', { key: key, value: value, controller: "cities", action: "search" });
    }