
    $(document).ready(function() {
        $("#departament_form").validate();
     });

    function searchDepartament(key, value) {
        renderQuery('.content-data', 'index.php', { key: key, value: value, controller: "departaments", action: "search" });
    }