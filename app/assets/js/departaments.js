
    function editDepartament(id, code, name, country) {
        renderQuery('.content', 'index.php', { id: id, code: code, name: name, country_id: country, controller: "departaments", action: "edit" });
    }

    function deleteDepartament(id) {
        renderQuery('#departaments-list', 'index.php', { id: id, controller: "departaments", action: "delete" });
    }

    function searchDepartament(key, value) {
        renderQuery('#departaments-list', 'index.php', { key: key, value: value, controller: "departaments", action: "search" });
    }