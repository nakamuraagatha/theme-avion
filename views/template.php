<!DOCTYPE html>
<html class="<?= $params['html_class'] ?>" lang="<?= $intl->getLocaleTag() ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $view->render('head') ?>
        <?php $view->style('theme', $params['style'] ? 'theme:css/theme.'.$params['style'].'.css' : 'theme:css/theme.css') ?>
        <?php $view->script('theme', 'theme:js/theme.js', ['uikit-sticky',  'uikit-lightbox',  'uikit-parallax', 'uikit-datepicker']) ?>
        <?php $view->script('particles', 'theme:js/particles.min.js') ?>
        <?php $view->script('particles-jquery', 'theme:js/particles.jquery.js') ?>
    </head>
    <body>

    <?php if (($params['header_layout'] == 'alt') && ($params['logo'] || $view->menu()->exists('main') || $view->position()->exists('navbar'))) : ?>
        <?= $view->position('navbar', 'header-alt.php') ?>
    <?php endif ?>

    <div class="uk-container uk-container-center">

        <?php if (($params['header_layout'] == 'default') && ($params['logo'] || $view->menu()->exists('main') || $view->position()->exists('navbar'))) : ?>
            <?= $view->position('navbar', 'header-default.php') ?>
        <?php endif ?>

        <?php if ($view->position()->exists('top')) : ?>
        <section id="tm-top" class="tm-top uk-grid uk-grid-match<?= $params['top_gutter'] ? ' uk-grid-collapse' : '' ; ?>" data-uk-grid-margin>
            <?= $view->position('top', 'position-grid.php') ?>
        </section>
        <?php endif; ?>

        <?php if ($view->position()->exists('top_b')) : ?>
        <section id="tm-top-b" class="tm-top-b uk-grid uk-grid-match<?= $params['top_b_gutter'] ? ' uk-grid-collapse' : '' ; ?>" data-uk-grid-margin>
            <?= $view->position('top_b', 'position-grid.php') ?>
        </section>
        <?php endif; ?>

        <?php if ($view->position()->exists('top_c')) : ?>
        <section id="tm-top-c" class="tm-top-c uk-grid uk-grid-match<?= $params['top_c_gutter'] ? ' uk-grid-collapse' : '' ; ?>" data-uk-grid-margin>
            <?= $view->position('top_c', 'position-grid.php') ?>
        </section>
        <?php endif; ?>

        <?php if ($view->position()->exists('top_d')) : ?>
        <section id="tm-top-d" class="tm-top-d uk-grid uk-grid-match<?= $params['top_d_gutter'] ? ' uk-grid-collapse' : '' ; ?>" data-uk-grid-margin>
            <?= $view->position('top_d', 'position-grid.php') ?>
        </section>
        <?php endif; ?>

        <div id="tm-main" class="tm-main uk-grid" data-uk-grid-match data-uk-grid-margin>

            <main class="<?= $view->position()->exists('sidebar') ? 'uk-width-medium-3-4' : 'uk-width-1-1'; ?>">
                <?= $view->render('content') ?>
            </main>

            <?php if ($view->position()->exists('sidebar')) : ?>
            <aside class="uk-width-medium-1-4 <?= $params['sidebar_first'] ? 'uk-flex-order-first-medium' : ''; ?>">
                <?= $view->position('sidebar', 'position-panel.php') ?>
            </aside>
            <?php endif ?>

        </div>

        <?php if ($view->position()->exists('bottom')) : ?>
        <section id="tm-bottom" class="tm-bottom uk-grid uk-grid-match<?= $params['bottom_gutter'] ? ' uk-grid-collapse' : '' ; ?>" data-uk-grid-margin>
            <?= $view->position('bottom', 'position-grid.php') ?>
        </section>
        <?php endif; ?>

        <?php if ($view->position()->exists('bottom_b')) : ?>
        <section id="tm-bottom-b" class="tm-bottom-b uk-grid uk-grid-match<?= $params['bottom_b_gutter'] ? ' uk-grid-collapse' : '' ; ?>" data-uk-grid-margin>
            <?= $view->position('bottom_b', 'position-grid.php') ?>
        </section>
        <?php endif; ?>

        <?php if ($view->position()->exists('bottom_c')) : ?>
        <section id="tm-bottom-c" class="tm-bottom-c uk-grid uk-grid-match<?= $params['bottom_c_gutter'] ? ' uk-grid-collapse' : '' ; ?>" data-uk-grid-margin>
            <?= $view->position('bottom_c', 'position-grid.php') ?>
        </section>
        <?php endif; ?>

        <?php if ($view->position()->exists('bottom_d')) : ?>
        <section id="tm-bottom-d" class="tm-bottom-d uk-grid uk-grid-match<?= $params['bottom_d_gutter'] ? ' uk-grid-collapse' : '' ; ?>" data-uk-grid-margin>
            <?= $view->position('bottom_d', 'position-grid.php') ?>
        </section>
        <?php endif; ?>

        <?php if ($view->position()->exists('footer') || $params['totop_scroller']) : ?>
        <div id="tm-footer" class="tm-footer<?= $params['footer_margin'] ? ' tm-footer-margin-top' : '' ; ?>">

            <?php if ($params['totop_scroller']) : ?>
            <a class="tm-totop-scroller uk-link-reset" data-uk-smooth-scroll href="#"></a>
            <?php endif; ?>
            <?= $view->position('footer', 'position-panel.php') ?>

        </div>
        <?php endif; ?>

    </div>

        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">

                <?php if ($params['logo_offcanvas']) : ?>
                <div class="uk-panel uk-text-center">
                    <a href="<?= $view->url()->get() ?>">
                        <img src="<?= $this->escape($params['logo_offcanvas']) ?>" alt="">
                    </a>
                </div>
                <?php endif ?>

                <?php if ($view->menu()->exists('offcanvas')) : ?>
                    <?= $view->menu('offcanvas', ['class' => 'uk-nav-offcanvas']) ?>
                <?php endif ?>

                <?php if ($view->position()->exists('offcanvas')) : ?>
                    <?= $view->position('offcanvas', 'position-panel.php') ?>
                <?php endif ?>

            </div>
        </div>
        <?php endif ?>

        <?= $view->render('footer') ?>

    </body>
</html>
