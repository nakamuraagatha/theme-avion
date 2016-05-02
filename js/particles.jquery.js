(function($) {

    var id = 1;

    var ColorUtil = {

        lightOrDark: function(hexcolor) {
            return this._rgbToHsl.apply(this, this._parseColor(hexcolor).slice(0,3))[2] <0.6 ? 'dark':'light';
        },

        _rgbToHsl: function(r, g, b){

            r /= 255, g /= 255, b /= 255;

            var max = Math.max(r, g, b), min = Math.min(r, g, b);
            var h, s, l = (max + min) / 2;

            if(max == min){
                h = s = 0; // achromatic
            }else{
                var d = max - min;
                s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                switch(max){
                    case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                    case g: h = (b - r) / d + 2; break;
                    case b: h = (r - g) / d + 4; break;
                }
                h /= 6;
            }

            return [h, s, l];
        },

        _parseColor: function(color) {

            var match, quadruplet;

            // match #aabbcc
            if (match = /#([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})/.exec(color)) {
                quadruplet = [parseInt(match[1], 16), parseInt(match[2], 16), parseInt(match[3], 16), 1];

            // match #abc
            } else if (match = /#([0-9a-fA-F])([0-9a-fA-F])([0-9a-fA-F])/.exec(color)) {
                quadruplet = [parseInt(match[1], 16) * 17, parseInt(match[2], 16) * 17, parseInt(match[3], 16) * 17, 1];

            // match rgb(n, n, n)
            } else if (match = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(color)) {
                quadruplet = [parseInt(match[1]), parseInt(match[2]), parseInt(match[3]), 1];

            // match rgba(n,n,n,o)
            } else if (match = /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9\.]*)\s*\)/.exec(color)) {
                quadruplet = [parseInt(match[1], 10), parseInt(match[2], 10), parseInt(match[3], 10),parseFloat(match[4])];

                // No browser returns rgb(n%, n%, n%), so little reason to support this format.
            } else {
                quadruplet = [255,255,255,0];
            }

            return quadruplet;
        }
    };


    $.fn.particles = function(options) {

        options = $.extend({
            color: 'auto',
            opacity: 0.35
        }, options)


        return this.each(function(){

            var $container = $(this).css('position', 'relative'),
                cid        = 'particles-'+(++id),
                o          = $.extend({}, options, $container.data('particles') || {}),
                color      = ColorUtil.lightOrDark($container.css('background-color')) == 'dark' ? '#ffffff':'#000000',
                $canvas    = $('<div></div>').attr('id', cid).css({
                    display: 'block',
                    position: 'absolute',
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }).prependTo($container);

            if (o.color && o.color !== 'auto') {
                color = o.color;
            }

            particlesJS(cid, {
                "particles": {
                    "number": {
                        "value": 100,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": color,
                        "opacity": o.opacity
                    },
                    "shape": {
                        "type": "circle",

                    },
                    "opacity": {
                        "value": o.opacity,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": color,
                        "opacity": o.opacity,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 3,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": true,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "resize": true
                    }
                },
                "retina_detect": true
            });
        });
    };

    $(function(){
        $('[data-particles]').particles();
    });

})(jQuery);
