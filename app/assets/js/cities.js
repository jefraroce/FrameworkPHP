
    function deleteCity(id) {
        renderQuery('#cities-list', 'index.php', { id: id, controller: "cities", action: "delete" });
    }

    function searchCity(key, value) {
        renderQuery('#cities-list', 'index.php', { key: key, value: value, controller: "cities", action: "search" });
    }