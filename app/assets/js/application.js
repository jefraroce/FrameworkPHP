/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function renderQuery( selector, url, options ) {
  options = jQuery.extend( true, {}, {
    remote : true,
    dataType : 'html'
  }, options );
  
  //console.log('Opciones ' + options);

  //jQuery( selector ).load( url );
  var ajaxOptions = {
    url : url,
    dataType : options.dataType,
    data : options, 
    success : function( result, textStatus, jqXHR ) {
        jQuery( selector ).html( result );
    }
  };
  jQuery.ajax( ajaxOptions );
}

    function pathCountry() {
        location.href = "?controller=countries&action=index";
    }

    function pathDepartament() {
        location.href = "?controller=departaments&action=index";
    }
    
    function pathCity() {
        location.href = "?controller=cities&action=index";
    }