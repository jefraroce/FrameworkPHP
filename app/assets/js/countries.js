
    $(document).ready(function() {
        $("#country_form").validate();
     });
    
    function searchCountry(key, value) {
        renderQuery('.content-data', 'index.php', { key: key, value: value, controller: "countries", action: "search" });
    }