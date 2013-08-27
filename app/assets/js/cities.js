    
    function editCity(id, code, name, depart) {
        renderQuery('.content', 'index.php', { id: id, code: code, name: name, depart_id: depart, controller: "cities", action: "edit" });
    }

    function deleteCity(id) {
        renderQuery('#cities-list', 'index.php', { id: id, controller: "cities", action: "delete" });
    }
    
    function showCity(id) {
        location.href = "?controller=cities&action=show&id=" + id;
    }

    function searchCity(key, value) {
        renderQuery('#cities-list', 'index.php', { key: key, value: value, controller: "cities", action: "search" });
    }
    
    function createCity() {
        location.href = '?controller=cities&action=create';
    }