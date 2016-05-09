<?php foreach ($widgets as $widget) :

$particle = '';

if (array_key_exists('animation', $widget->theme)) {
    if ($widget->theme['animation'] == 'light') $particle = "data-particles='{\"color\":\"#fff\"}'";
    if ($widget->theme['animation'] == 'dark') $particle = "data-particles='{\"color\":\"#000\"}'";
    if ($widget->theme['animation'] == 'auto') $particle = "data-particles";
}

?>


<div class="uk-panel <?= $widget->theme['panel'] ?> <?= $widget->theme['alignment'] ? 'uk-text-center' : '' ?> <?= $widget->theme['padding'] ? 'uk-padding-remove' : '' ?> <?= $widget->theme['html_class'] ?>" <?= $particle ?>>

    <?php if (!$widget->theme['title_hide']) : ?>
    <h3 class="<?= $widget->theme['title_size'] ?>"><?= $widget->title ?></h3>
    <?php endif ?>

    <?= $widget->get('result') ?>

</div>
<?php endforeach ?>
