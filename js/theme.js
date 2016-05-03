(function($){

    $(function(){

        // fit footer
        (function(main, meta, fn){

            if (!main.length) return;

            fn = function() {

                main.css('min-height','');

                meta = document.body.getBoundingClientRect();

                if (meta.height < window.innerHeight) {
                    main.css('min-height', (main.outerHeight() + (window.innerHeight - meta.height))+'px');
                }

                return fn;
            };

            UIkit.$win.on('load resize', fn());

        })($('#tm-main'));

        // Ripple Effect (by http://codepen.io/440design/pen/iEztk), modified by YOOtheme
        (function(d, x, y){

            $(document).on("click", ".uk-button, .uk-nav-dropdown > li > a, .uk-nav-navbar > li > a, .uk-nav-offcanvas > li > a, .uk-tab > li > a", function(e){

                var ele = $(this), ink = ele.data('ripple');

                if (!ink){
                    ink = $("<span class='tm-ripple'></span>").prependTo(ele);
                    ele.data('ripple', ink);
                }

                ink.removeClass("tm-animate-ripple");

                if (!ink.height() && !ink.width()){
                    d = Math.max(ele.outerWidth(), ele.outerHeight());
                    ink.css({height: d, width: d});
                }

                x = e.pageX - ele.offset().left - ink.width()/2;
                y = e.pageY - ele.offset().top - ink.height()/2;

                ink.css({top: y+'px', left: x+'px'}).addClass("tm-animate-ripple");
            });
        })();

        // Delete grid-divider border on first item in row
        $('.uk-grid.tm-grid-divider').each(function() {
            var $this = $(this),
                items = $this.children().filter(':visible'), pos;

            if (items.length > 0) {
                pos_cache = items.first().position().left;

                UIkit.$win.on('load resize', UIkit.Utils.debounce((function(fn) {

                    fn = function () {

                        items.each(function() {

                            pos = $(this).position();

                            $(this)[pos.left == pos_cache ? 'addClass':'removeClass']('tm-border-none');
                        });

                        return fn;
                    }

                    return fn();

                })(), 80));
            }

        });

    });

})(jQuery);
