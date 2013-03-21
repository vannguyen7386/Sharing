<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://code.jquery.com/jquery-1.7.2.min.js" type="text/javascript"></script>
        
    </head>
    <body>
        <div>TODO write content</div>
        <a href="#" id="redirect">Load data</a>
        <div class="update_content">
            <form id="myForm">
            <?php
            for ($i = 0; $i < 5; $i++) {
                echo "<input type='text' class='txtId' name='id[]' value='$i'/>";
            }
            ?>
            </form>
        </div>
    </body>
</html>

<script type="text/javascript">
    var arr = new Array(1, 2, 3, 4, 5);
    var jsonText = JSON.stringify(arr);
    var textEl = "[";
    
    jQuery(document).ready(function(){
        jQuery('#myForm input[type=text]').each(function(){
            textEl += $(this).val()+",";
        });
        textEl = textEl.substring(0, textEl.length - 1);
        textEl += "]";
        
        jQuery('#redirect').click(function(){
            jQuery.ajax({
                type: "POST",
                url :  "load_data.php",
                data: '&data=' + textEl,
                success: function(msg){
                    jQuery('.update_content').html(msg);
                }
            });
        });
    });
</script>
