<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax-injections</title>
</head>
<body>
    <h3>Write down your SQL here</h3>
    <textarea id="queryText"></textarea>
    <br>
    <button id="sendButton">Send</button>
    <p id="resultText"></p>
    <a href="https://github.com/ctYurk15/ajax-injections">GitHub</a>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        
        $("#sendButton").on("click", function(){

            var query = $("#queryText").val();
            console.log(query);

            $.ajax({
                url: "http://personal-website/ajaxinjections-api",
                type: "POST",
                data: {
                    query: query
                },
                success: function(data){
                    var receivedData = JSON.parse(JSON.stringify(data));
                    $("#resultText").text(receivedData);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
</html>