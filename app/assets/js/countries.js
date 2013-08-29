
    $(document).ready(function() {
        $("#country_form").validate();
     });
    
    function deleteCountry(id) {
        renderQuery('#countries-list', 'index.php', { id: id, controller: "countries", action: "delete" });
    }
    
    function searchCountry(key, value) {
        renderQuery('#countries-list', 'index.php', { key: key, value: value, controller: "countries", action: "search" });
    }