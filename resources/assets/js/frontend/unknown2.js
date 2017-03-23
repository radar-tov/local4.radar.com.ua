;Materialize = {};
Materialize.guid = (function () {
    function s4() {
        return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
    }

    return function () {
        return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
    };
})();
Materialize.elementOrParentIsFixed = function (element) {
    var $element = $(element);
    var $checkElements = $element.add($element.parents());
    var isFixed = false;
    $checkElements.each(function () {
        if ($(this).css("position") === "fixed") {
            isFixed = true;
            return false;
        }
    });
    return isFixed;
};
var Vel;
if ($) {
    Vel = $.Velocity;
} else {
    Vel = Velocity;
}
;(function ($) {
    $.fn.collapsible = function (options) {
        var defaults = {accordion: undefined};
        options = $.extend(defaults, options);
        return this.each(function () {
            var $this = $(this);
            var $panel_headers = $(this).find('> li > .collapsible-header');
            var collapsible_type = $this.data("collapsible");
            $this.off('click.collapse', '.collapsible-header');
            $panel_headers.off('click.collapse');
            function accordionOpen(object) {
                $panel_headers = $this.find('> li > .collapsible-header');
                if (object.hasClass('active')) {
                    object.parent().addClass('active');
                } else {
                    object.parent().removeClass('active');
                }
                if (object.parent().hasClass('active')) {
                    object.siblings('.collapsible-body').stop(true, false).slideDown({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: false,
                        complete: function () {
                            $(this).css('height', '');
                        }
                    });
                } else {
                    object.siblings('.collapsible-body').stop(true, false).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: false,
                        complete: function () {
                            $(this).css('height', '');
                        }
                    });
                }
                $panel_headers.not(object).removeClass('active').parent().removeClass('active');
                $panel_headers.not(object).parent().children('.collapsible-body').stop(true, false).slideUp({
                    duration: 350,
                    easing: "easeOutQuart",
                    queue: false,
                    complete: function () {
                        $(this).css('height', '');
                    }
                });
            }

            function expandableOpen(object) {
                if (object.hasClass('active')) {
                    object.parent().addClass('active');
                } else {
                    object.parent().removeClass('active');
                }
                if (object.parent().hasClass('active')) {
                    object.siblings('.collapsible-body').stop(true, false).slideDown({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: false,
                        complete: function () {
                            $(this).css('height', '');
                        }
                    });
                } else {
                    object.siblings('.collapsible-body').stop(true, false).slideUp({
                        duration: 350,
                        easing: "easeOutQuart",
                        queue: false,
                        complete: function () {
                            $(this).css('height', '');
                        }
                    });
                }
            }

            function isChildrenOfPanelHeader(object) {
                var panelHeader = getPanelHeader(object);
                return panelHeader.length > 0;
            }

            function getPanelHeader(object) {
                return object.closest('li > .collapsible-header');
            }

            if (options.accordion || collapsible_type === "accordion" || collapsible_type === undefined) {
                $panel_headers = $this.find('> li > .collapsible-header');
                $panel_headers.on('click.collapse', function (e) {
                    var element = $(e.target);
                    if (isChildrenOfPanelHeader(element)) {
                        element = getPanelHeader(element);
                    }
                    element.toggleClass('active');
                    accordionOpen(element);
                });
                accordionOpen($panel_headers.filter('.active').first());
            } else {
                $panel_headers.each(function () {
                    $(this).on('click.collapse', function (e) {
                        var element = $(e.target);
                        if (isChildrenOfPanelHeader(element)) {
                            element = getPanelHeader(element);
                        }
                        element.toggleClass('active');
                        expandableOpen(element);
                    });
                    if ($(this).hasClass('active')) {
                        expandableOpen($(this));
                    }
                });
            }
        });
    };
    $(document).ready(function () {
        $('.collapsible').collapsible();
    });
}(jQuery));
;(function ($) {
    $.fn.scrollTo = function (elem) {
        $(this).scrollTop($(this).scrollTop() - $(this).offset().top + $(elem).offset().top);
        return this;
    };
    $.fn.dropdown = function (option) {
        var defaults = {
            inDuration: 300,
            outDuration: 225,
            constrain_width: true,
            hover: false,
            gutter: 0,
            belowOrigin: false
        };
        this.each(function () {
            var origin = $(this);
            var options = $.extend({}, defaults, option);
            var activates = $("#" + origin.attr('data-activates'));

            function updateOptions() {
                if (origin.data('induration') !== undefined) options.inDuration = origin.data('inDuration');
                if (origin.data('outduration') !== undefined) options.outDuration = origin.data('outDuration');
                if (origin.data('constrainwidth') !== undefined) options.constrain_width = origin.data('constrainwidth');
                if (origin.data('hover') !== undefined) options.hover = origin.data('hover');
                if (origin.data('gutter') !== undefined) options.gutter = origin.data('gutter');
                if (origin.data('beloworigin') !== undefined) options.belowOrigin = origin.data('beloworigin');
            }

            updateOptions();
            origin.after(activates);
            function placeDropdown() {
                updateOptions();
                activates.addClass('active');
                if (options.constrain_width === true) {
                    activates.css('width', origin.outerWidth());
                }
                var offset = 0;
                if (options.belowOrigin === true) {
                    offset = origin.height();
                }
                var offsetLeft = origin.offset().left;
                var width_difference = 0;
                var gutter_spacing = options.gutter;
                if (offsetLeft + activates.innerWidth() > $(window).width()) {
                    width_difference = origin.innerWidth() - activates.innerWidth();
                    gutter_spacing = gutter_spacing * -1;
                }
                activates.css({
                    position: 'absolute',
                    top: origin.position().top + offset,
                    left: origin.position().left + width_difference + gutter_spacing
                });
                activates.stop(true, true).css('opacity', 0).slideDown({
                    queue: false,
                    duration: options.inDuration,
                    easing: 'easeOutCubic',
                    complete: function () {
                        $(this).css('height', '');
                    }
                }).animate({opacity: 1}, {queue: false, duration: options.inDuration, easing: 'easeOutSine'});
            }

            function hideDropdown() {
                activates.fadeOut(options.outDuration);
                activates.removeClass('active');
            }

            if (options.hover) {
                var open = false;
                origin.unbind('click.' + origin.attr('id'));
                origin.on('mouseenter', function (e) {
                    if (open === false) {
                        placeDropdown();
                        open = true;
                    }
                });
                origin.on('mouseleave', function (e) {
                    var toEl = e.toElement || e.relatedTarget;
                    if (!$(toEl).closest('.dropdown-content').is(activates)) {
                        activates.stop(true, true);
                        hideDropdown();
                        open = false;
                    }
                });
                activates.on('mouseleave', function (e) {
                    var toEl = e.toElement || e.relatedTarget;
                    if (!$(toEl).closest('.dropdown-button').is(origin)) {
                        activates.stop(true, true);
                        hideDropdown();
                        open = false;
                    }
                });
            } else {
                origin.unbind('click.' + origin.attr('id'));
                origin.bind('click.' + origin.attr('id'), function (e) {
                    if (origin[0] == e.currentTarget && ($(e.target).closest('.dropdown-content').length === 0)) {
                        e.preventDefault();
                        placeDropdown();
                    } else {
                        if (origin.hasClass('active')) {
                            hideDropdown();
                            $(document).unbind('click.' + activates.attr('id'));
                        }
                    }
                    if (activates.hasClass('active')) {
                        $(document).bind('click.' + activates.attr('id'), function (e) {
                            if (!activates.is(e.target) && !origin.is(e.target) && (!origin.find(e.target).length > 0)) {
                                hideDropdown();
                                $(document).unbind('click.' + activates.attr('id'));
                            }
                        });
                    }
                });
            }
            origin.on('open', placeDropdown);
            origin.on('close', hideDropdown);
        });
    };
    $(document).ready(function () {
        $('.dropdown-button').dropdown();
    });
}(jQuery));
;(function ($) {
    var _stack = 0, _lastID = 0, _generateID = function () {
        _lastID++;
        return 'materialize-lean-overlay-' + _lastID;
    };
    $.fn.extend({
        openModal: function (options) {
            $('body').css('overflow', 'hidden');
            var defaults = {
                opacity: 0.5,
                in_duration: 350,
                out_duration: 250,
                ready: undefined,
                complete: undefined,
                dismissible: true,
                starting_top: '4%'
            }, overlayID = _generateID(), $modal = $(this), $overlay = $('<div class="lean-overlay"></div>'), lStack = (++_stack);
            $overlay.attr('id', overlayID).css('z-index', 1000 + lStack * 2);
            $modal.data('overlay-id', overlayID).css('z-index', 1000 + lStack * 2 + 1);
            $("body").append($overlay);
            options = $.extend(defaults, options);
            if (options.dismissible) {
                $overlay.click(function () {
                    $modal.closeModal(options);
                });
                $(document).on('keyup.leanModal' + overlayID, function (e) {
                    if (e.keyCode === 27) {
                        $modal.closeModal(options);
                    }
                });
            }
            $modal.find(".modal-close").on('click.close', function (e) {
                $modal.closeModal(options);
            });
            $overlay.css({display: "block", opacity: 0});
            $modal.css({display: "block", opacity: 0});
            $overlay.velocity({opacity: options.opacity}, {
                duration: options.in_duration,
                queue: false,
                ease: "easeOutCubic"
            });
            $modal.data('associated-overlay', $overlay[0]);
            if ($modal.hasClass('bottom-sheet')) {
                $modal.velocity({bottom: "0", opacity: 1}, {
                    duration: options.in_duration,
                    queue: false,
                    ease: "easeOutCubic",
                    complete: function () {
                        if (typeof(options.ready) === "function") {
                            options.ready();
                        }
                    }
                });
            } else {
                $.Velocity.hook($modal, "scaleX", 0.7);
                $modal.css({top: options.starting_top});
                $modal.velocity({top: "10%", opacity: 1, scaleX: '1'}, {
                    duration: options.in_duration,
                    queue: false,
                    ease: "easeOutCubic",
                    complete: function () {
                        if (typeof(options.ready) === "function") {
                            options.ready();
                        }
                    }
                });
            }
        }
    });
    $.fn.extend({
        closeModal: function (options) {
            var defaults = {
                out_duration: 250,
                complete: undefined
            }, $modal = $(this), overlayID = $modal.data('overlay-id'), $overlay = $('#' + overlayID);
            options = $.extend(defaults, options);
            $('body').css('overflow', '');
            $modal.find('.modal-close').off('click.close');
            $(document).off('keyup.leanModal' + overlayID);
            $overlay.velocity({opacity: 0}, {duration: options.out_duration, queue: false, ease: "easeOutQuart"});
            if ($modal.hasClass('bottom-sheet')) {
                $modal.velocity({bottom: "-100%", opacity: 0}, {
                    duration: options.out_duration,
                    queue: false,
                    ease: "easeOutCubic",
                    complete: function () {
                        $overlay.css({display: "none"});
                        if (typeof(options.complete) === "function") {
                            options.complete();
                        }
                        $overlay.remove();
                        _stack--;
                    }
                });
            } else {
                $modal.velocity({top: options.starting_top, opacity: 0, scaleX: 0.7}, {
                    duration: options.out_duration,
                    complete: function () {
                        $(this).css('display', 'none');
                        if (typeof(options.complete) === "function") {
                            options.complete();
                        }
                        $overlay.remove();
                        _stack--;
                    }
                });
            }
        }
    });
    $.fn.extend({
        leanModal: function (option) {
            return this.each(function () {
                var defaults = {starting_top: '4%'}, options = $.extend(defaults, option);
                $(this).click(function (e) {
                    options.starting_top = ($(this).offset().top - $(window).scrollTop()) / 1.15;
                    var modal_id = $(this).attr("href") || '#' + $(this).data('target');
                    $(modal_id).openModal(options);
                    e.preventDefault();
                });
            });
        }
    });
})(jQuery);