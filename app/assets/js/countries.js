    
    function editCountry(id, code, name) {
        renderQuery('.content', 'index.php', { id: id, code: code, name: name, controller: "countries", action: "edit" });
    }

    function deleteCountry(id) {
        renderQuery('#countries-list', 'index.php', { id: id, controller: "countries", action: "delete" });
    }
    
    function showCountry(id) {
        location.href = "?controller=countries&action=show&id=" + id;
    }

    function searchCountry(key, value) {
        renderQuery('#countries-list', 'index.php', { key: key, value: value, controller: "countries", action: "search" });
    }
    
    function createCountry() {
        location.href = '?controller=countries&action=create';
    }