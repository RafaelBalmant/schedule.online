<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .div-red
    {
        background-color: red;
        width: 250px;
        height: 250px;
        cursor: pointer;
    }

    .div-yellow
    {
        background-color: yellow;
        width: 250px;
        height: 250px;
        cursor: pointer;
    }
</style>
<body>
<div  id="div" class="div-red" onclick="getYellow()">

</div>
<script>

    var click = 0

    function getYellow()
    {
        if(click ===0 )
        {
            div.classList.remove("div-red");
            div.classList.add("div-yellow");
            click = 1
        }

        else
            {
                div.classList.remove("div-yellow");
                div.classList.add("div-red");
                click = 0
            }

    }

</script>
</body>
</html>