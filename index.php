<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.7.2.js" type="text/javascript"></script>
    </head>
    <body>
        <p>Browser info:</p>

        <script>
            jQuery.each(jQuery.browser, function(i, val) {
                $("<div>" + i + " : <span>" + val + "</span>")
                .appendTo( document.body );
            });</script>
    </body>
</html>
