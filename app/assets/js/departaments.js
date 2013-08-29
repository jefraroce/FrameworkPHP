
    $(document).ready(function() {
        $("#departament_form").validate();
     });
    
    function deleteDepartament(id) {
        renderQuery('#departaments-list', 'index.php', { id: id, controller: "departaments", action: "delete" });
    }

    function searchDepartament(key, value) {
        renderQuery('#departaments-list', 'index.php', { key: key, value: value, controller: "departaments", action: "search" });
    }