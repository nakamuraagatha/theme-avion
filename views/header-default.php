<div class="tm-header">

    <?php if ($view->position()->exists('toolbar_l') || $view->position()->exists('toolbar_r')) : ?>
        <div class="tm-toolbar uk-clearfix uk-hidden-small">

            <?php if ($view->position()->exists('toolbar_l')) : ?>
            <div class="uk-float-left"><?= $view->position('toolbar_l', 'position-panel.php') ?></div>
            <?php endif; ?>

            <?php if ($view->menu()->exists('toolbar_l')) : ?>
                <div class="uk-float-left"><?= $view->menu('toolbar_l', 'menu-toolbar.php') ?></div>
            <?php endif ?>

            <?php if ($view->position()->exists('toolbar_r')) : ?>
            <div class="uk-float-right"><?= $view->position('toolbar_r', 'position-panel.php') ?></div>
            <?php endif; ?>

            <?php if ($view->menu()->exists('toolbar_r')) : ?>
                <div class="uk-float-right"><?= $view->menu('toolbar_r', 'menu-toolbar.php') ?></div>
            <?php endif ?>

        </div>
    <?php endif; ?>

    <nav class="uk-navbar">

        <a class="uk-navbar-brand" href="<?= $view->url()->get() ?>">
            <?php if ($params['logo']) : ?>
                <img class="tm-logo uk-responsive-height uk-hidden-small" src="<?= $this->escape($params['logo']) ?>" alt="">
                <img class="tm-logo-small uk-responsive-height uk-visible-small" src="<?= ($params['logo_small']) ? $this->escape($params['logo_small']) : $this->escape($params['logo']) ?>" alt="">
            <?php else : ?>
                <?= $params['title'] ?>
            <?php endif ?>
        </a>

        <?php if ($view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
        <div class="uk-hidden-small">
            <?= $view->menu('main', 'menu-navbar.php') ?>
            <?= $view->position('navbar', 'position-blank.php') ?>
        </div>
        <?php endif ?>

        <?php if ($view->position()->exists('navbar_more')) : ?>
        <div class="uk-navbar-flip">
            <div class="uk-flex uk-flex-middle uk-navbar-content tm-navbar-more uk-visible-large" data-uk-dropdown="{mode:'click'}">
                <a class="uk-link-reset"></a>
                <div class="uk-dropdown uk-dropdown-flip">
                <?= $view->position('navbar_more', 'position-blank.php') ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
        <div class="uk-navbar-flip uk-visible-small">
            <a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
        </div>
        <?php endif ?>

    </nav>

</div>