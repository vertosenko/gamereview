<?php
 if (!empty($_POST)){
     $response = array(
         'html' => 'Hi '. $_POST['fio'] . '<button id="new">New</button>',
     );


     echo json_encode($response);
     exit;
 }
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Case</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div id = "static">
	static
</div>

<div id = "result">
    <div class="progress hidden" style="    background: url('images/ajax-loader.gif'); width:32px; height:32px"></div>
    <input type="text" name = "fio" id = "fio">
    <button id = "submit">Send</button>
</div>
<script>
    $('#submit').click(function(){
        var fio = $('#fio').val();
        $.ajax({
            'type' : 'post',
            'url' : '111.php',
            'data' : 'fio=' + fio + '&id=0',
            'success' : function(res){
                var data = JSON.parse(res);

                $('#result').html(data.html);
            },
            beforeSend: function(){
                $('.progress').removeClass('hidden');
            },
            complete: function(){
                //$('.progress').addClass('hidden');
            }
        });
    });

    $( document ).on( "click", "#new", function() {
        alert( "Goodbye!" );  // jQuery 1.7+
    });

</script>

</body>
</html>