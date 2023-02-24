<div class="row">
    <div class="card my-5 p-5 col-12 col-md-8 m-auto">
        <h1 class="fw-lighter text-decoration-underline"><?= $article['title'] ?></h1>
        <p class="mt-3"><?= $article['content'] ?></p>
        <hr>
        <p class="fw-bold">rédigé par: <?= $article['article_author_pseudo'] ?></p>
    </div>
</div>

<?php if (isset($_SESSION['user_id'])) : ?>
    <div class="row mb-5">
        <h3 class="text-center fw-bold">Ajouter un commentaire</h3>
        <form class="form col-12 col-md-4 m-auto d-flex flex-column" method="post" action="/mvc/comments/add">
            <input type="hidden" name="article_id" value="<?= $article['id']; ?>">
            <input type="hidden" name="article_slug" value="<?= $article['slug']; ?>">
            <div class="form-group">
                <label class="form-label" for="content"></label>
                <textarea class="form-control" id="content" name="content" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary col-5 m-auto mt-3 w-25">Envoyer</button>
        </form>
    </div>

<?php else: ?>
    <div class="alert alert-info m-auto col col-md-5 col-lg-3 mb-5 text-center p-x-0" role="alert">
        Vous devez être connecté afin de mettre un commentaire !
    </div>
<?php endif; ?>

<h2 id="comments" class="text-center">Liste des commentaires (<?= sizeof($article['comments']); ?>) : </h2>
<div class="d-flex my-5 justify-content-center align-items-center flex-column">
    <?php foreach ($article['comments'] as $comment): ?>
        <div class="card col-12 col-md-8 col-lg-4 my-2 p-4 shadow-lg">
            <p class="m-0 text-primary fw-bold"><?= $comment['comment_author_pseudo'] ?></p> <span><?= $comment['comment_date'] ?></span>
            <hr>
            <p class="m-0"><?= $comment['comment_content'] ?></p>
        </div>
    <?php endforeach; ?>
</div>
