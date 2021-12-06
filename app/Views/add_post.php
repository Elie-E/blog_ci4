<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un post</title>
</head>
<body>

    <form action="addPost" method="post">

        <label for="post_key">key</label>
        <input type="text" name="post_key">
        <label for="post_lng">lng</label>
        <input type="text" name="post_lng">
        <label for="title">Titre</label>
        <input type="text" name="title">
        <label for="content">Contenu</label>
        <input type="text" name="content">
        
        <label for="enabled">Actif</label>
        <input type="checkbox" name="enabled">

        <p>Choisisez la/les catégorie(s) associé(es)</pack>
        <div>
            <?php foreach ($categories as $category) : ?>
                <label for="<?= $category->title ?>"><?= $category->title ?></label>
                <input type="checkbox" value="<?= $category->id_blog_cat ?>" name="categBox[]" id="<?= $category->title ?>">
            <?php endforeach ?>
        </div>

        <input type="submit">

    </form>
    
</body>
</html>