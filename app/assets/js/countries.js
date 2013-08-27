/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
$(document).ready(function() {
    $("#saveCountry").bind("click", function() {        
        var code = document.getElementById('code').value;
        var name = document.getElementById('name').value;
            if(code != '' && name != '') {
                document.getElementById('country_form').submit();
               /* if(document.getElementById('action').value == "insert") {
                    renderQuery('#countries-list', 'index.php', { code: code, name: name, controller: "countries", action: "insert" });
                } else {
                    var id = document.getElementById('id').value;
                    renderQuery('#countries-list', 'index.php', { id: id, code: code, name: name, controller: "countries", action: "update" });
                    document.getElementById('id').value = "";
                    document.getElementById('action').value = 1;
                }
                document.getElementById('code').value = "";
                document.getElementById('name').value = "";*/
      /*      } else {
                alert('The CODE and NAME are required.');
                return false;
            }
        }
    );
});*/
    
    function editCountry(id, code, name) {
        renderQuery('.content', 'index.php', { id: id, code: code, name: name, controller: "countries", action: "edit" });
    }

    function deleteCountry(id) {
        renderQuery('#countries-list', 'index.php', { id: id, controller: "countries", action: "delete" });
    }
    
    function showCountry(id) {
        $('.content').load('index.php', { id: id, controller: "countries", action: "show" });
    }

    function searchCountry(name) {
        renderQuery('#countries-list', 'index.php', { name: name, controller: "countries", action: "search" });
    }