<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Jeisson Rosas" />
        <title>#TITLE#</title>
        <link rel="stylesheet" type="text/css" href="<?php echo Route::getStyleSheetUrl("application"); ?>" >        
        <link rel="stylesheet" type="text/css" href="<?php global $controller; echo Route::getStyleSheetUrl($controller); ?>" > 
    </head>
    <body>
        <div class="container">
            <div class="header">
                #HEADER#
                <!-- end .header --></div>
            <div class="content">
                #CONTENIDO#
                <!-- end .content --></div>
            <div class="footer">
                #FOOTER#
                <!-- end .footer --></div> 
            <!-- end .container --></div>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Route::getJavaScriptUrl("jquery.validate.min"); ?>" ></script>
        <script type="text/javascript" src="<?php echo Route::getJavaScriptUrl("application"); ?>" ></script>
        <script type="text/javascript" src="<?php echo Route::getJavaScriptUrl($controller); ?>" ></script>
    </body>
</html>