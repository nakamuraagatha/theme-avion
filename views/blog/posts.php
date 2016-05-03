

<?php $view->script('posts', 'blog:app/bundle/posts.js', 'vue') ?>

<?php foreach ($posts as $post) : ?>
<article class="uk-article">

    <?php if ($image = $post->get('image.src')): ?>
        <a class="tm-article-featured-image uk-cover-background" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>" style="background-image: url(<?= $view->url($image) ?>);"></a>
    <?php endif ?>

    <div class="tm-article-content uk-position-relative">

        <div class="tm-article-date uk-text-center">
            <span class="tm-article-date-day">
                <?= __('%day', ['%day' => $post->date->format('d')]) ?>
            </span>
            <span class="tm-article-date-month">
                <?= __('%month', ['%month' => $post->date->format('M')]) ?>
            </span>
        </div>

        <div class="tm-article-date-hidden">
            <?= __('Written on %date%', ['%date%' => '<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time>' ]) ?>
        </div>

        <h1 class="uk-article-title"><a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><?= $post->title ?></a></h1>

        <p class="uk-article-meta">
            <?= __('Written by %name%', ['%name%' => $post->user->name]) ?>
        </p>

        <div class="uk-margin"><?= $post->excerpt ?: $post->content ?></div>

        <ul class="uk-subnav uk-margin-bottom-remove">

            <?php if (isset($post->readmore) && $post->readmore || $post->excerpt) : ?>
            <li><a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><?= __('Read more') ?></a></li>
            <?php endif ?>

            <?php if ($post->isCommentable() || $post->comment_count) : ?>
            <li><a href="<?= $view->url('@blog/id#comments', ['id' => $post->id]) ?>"><?= _c('{0} No comments|{1} %num% Comment|]1,Inf[ %num% Comments', $post->comment_count, ['%num%' => $post->comment_count]) ?></a></li>
            <?php endif ?>

        </ul>

    </div>

</article>

<?php endforeach ?>

<?php

    $range     = 3;
    $total     = intval($total);
    $page      = intval($page);
    $pageIndex = $page - 1;

?>

<?php if ($total > 1) : ?>
<ul class="uk-pagination">


    <?php for($i=1;$i<=$total;$i++): ?>
        <?php if ($i <= ($pageIndex+$range) && $i >= ($pageIndex-$range)): ?>

            <?php if ($i == $page): ?>
            <li class="uk-active"><span><?=$i?></span></li>
            <?php else: ?>
            <li>
                <a href="<?= $view->url('@blog/page', ['page' => $i]) ?>"><?=$i?></a>
            <li>
            <?php endif; ?>

        <?php elseif($i==1): ?>

            <li>
                <a href="<?= $view->url('@blog/page', ['page' => 1]) ?>">1</a>
            </li>
            <li><span>...</span></li>

        <?php elseif($i==$total): ?>

            <li><span>...</span></li>
            <li>
                <a href="<?= $view->url('@blog/page', ['page' => $total]) ?>"><?=$total?></a>
            </li>

        <?php endif; ?>
    <?php endfor; ?>


</ul>
<?php endif ?>
