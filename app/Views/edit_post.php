<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="edit" method="post">

    <input type="hidden" name="id_blog_post" value="<?= $post->id_blog_post ?>">

        <input type="text" name="post_key" value="<?= $post->post_key ?>">
        <input type="text" name="post_lng" value="<?= $post->post_lng ?>">
        <input type="text" name="title" value="<?= $post->title ?>">
        <input type="text" name="content" value="<?= $post->content ?>">
        
        <input type="checkbox" name="enabled" value="<?= $post->enabled ?>">

        <p>Choisisez la/les catégorie(s) associé(es)</pack>
        <div>
            <?php foreach ($categories as $category) : ?>


                <label for="<?= $category->title ?>"><?= $category->title ?></label>
                <input type="checkbox" value="<?= $category->id_blog_cat ?>" 
                name="categBox[]" id="<?= $category->title ?>"

                <?php foreach ($ids as $id) : ?>
                <?= $category->id_blog_cat == $id->id_blog_cat ? 'checked' : '' ?>>
                <?php endforeach ?>

            <?php endforeach ?>
        </div>

        <input type="submit">

    </form>
</body>
</html>