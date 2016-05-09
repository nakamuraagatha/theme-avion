<?php $view->script('post', 'blog:app/bundle/post.js', 'vue') ?>

<article class="uk-article">

    <?php if ($image = $post->get('image.src')): ?>
    <a class="tm-article-featured-image uk-cover-background" href="<?= $view->url($image) ?>" data-uk-lightbox title="<?= $post->get('image.alt') ?>" style="background-image: url(<?= $view->url($image) ?>);"></a>
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

        <div class="uk-margin"><?= $post->content ?></div>

        <?= $view->render('blog/comments.php') ?>

    </div>

</article>