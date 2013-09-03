<?php
if(!isset($_SESSION))
    session_start();

    if ( isset( $_SESSION[ 'flash' ][ 'notice' ] ) && !empty( $_SESSION[ 'flash' ][ 'notice' ] ) ) { 

        echo "<h5>Notice: ".$_SESSION[ 'flash' ][ 'notice' ]."</h5>";

    }

    if ( isset( $_SESSION[ 'flash' ][ 'error' ] ) && !empty( $_SESSION[ 'flash' ][ 'error' ] ) ) { 

        echo "<h6>Error: ".$_SESSION[ 'flash' ][ 'error' ]."</h6>";

    }

    if ( isset( $_SESSION[ 'flash' ][ 'warning' ] ) && !empty( $_SESSION[ 'flash' ][ 'warning' ] ) ) { 

        echo "<h6>Warning: ".$_SESSION[ 'flash' ][ 'warning' ]."</h6>";

    }
    
    session_destroy();
