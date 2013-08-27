<?php
/**
 * @author Jeisson Rosas
 */

interface IController {
       
    function index();

    function create();
    
    function insert($params);
    
    function edit($params);
    
    function update($params);
    
    function delete($params);
    
    function search($params);
    
    function show($params);
    
}
?>
