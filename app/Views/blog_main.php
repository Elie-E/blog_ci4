<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Code Igniter 4</title>
</head>
<body>
    
    <a href="addPost">Ajouter un post</a>

    <?php foreach($post as $row) : ?>

       <h2><?= $row->title ?></h2>
       <a href="/blog/<?= $row->id_blog_post ?>"> Lire </a>
       <p><?= $row->content ?></p>
       <p> Publié le : <?= $row->date_publication ?></p>

       <p>Actif (if alternatif) : 
           <?php if($row->enabled !== NULL) : ?> OUI <?php else : ?> NON <?php endif ?>
        </p>

        <p>Actif (if ternaire) : 
            <?= $row->enabled === NULL ? 'NON' : 'OUI' ?>
        </p>

       <a href="/edit/<?= $row->id_blog_post ?>">Modifier</a>
       <a href="/delete/<?= $row->id_blog_post ?>">Supprimer</a>

    <?php endforeach  ?>
</body>
</html>