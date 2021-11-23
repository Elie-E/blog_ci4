<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un post</title>
</head>
<body>
<?php
// var_dump($_REQUEST) ?>

    <form action="addPost" method="post">

        <input type="text" name="post_key">
        <input type="text" name="post_lng">
        <input type="text" name="title">
        <input type="text" name="content">
        
        <input type="checkbox" name="enabled">

        <input type="submit">

    </form>
    
</body>
</html>