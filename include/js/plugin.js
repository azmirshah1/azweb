/*global jQuery */
/*jshint browser:true */
/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/

(function( $ ){

  "use strict";

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null,
      ignore: null
    };

    if(!document.getElementById('fit-vids-style')) {
      // appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
      var head = document.head || document.getElementsByTagName('head')[0];
      var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
      var div = document.createElement('div');
      div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
      head.appendChild(div.childNodes[1]);
    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        "iframe[src*='player.vimeo.com']",
        "iframe[src*='youtube.com']",
        "iframe[src*='youtube-nocookie.com']",
        "iframe[src*='kickstarter.com'][src*='video.html']",
        "object",
        "embed"
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var ignoreList = '.fitvidsignore';

      if(settings.ignore) {
        ignoreList = ignoreList + ', ' + settings.ignore;
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not("object object"); // SwfObj conflict patch
      $allVideos = $allVideos.not(ignoreList); // Disable FitVids on this video.

      $allVideos.each(function(){
        var $this = $(this);
        if($this.parents(ignoreList).length > 0) {
          return; // Disable FitVids on this video.
        }
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width'))))
        {
          $this.attr('height', 9);
          $this.attr('width', 16);
        }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );






	/*
	 *
	 *	jQuery Sliding Menu Plugin
	 *	Mobile app list-style navigation in the browser
	 *
	 *	Written by Ali Zahid
	 *	http://designplox.com/jquery-sliding-menu
	 *
	 */

(function($) {
	"use strict";

	var usedIds = [];

	$.fn.menu = function(options)
	{
		var selector = this.selector;

		var settings = $.extend(
		{
			dataJSON: false,
			backLabel: 'Back'

		}, options);

		return this.each(function()
		{
			var self = this,
				menu = $(self),
				data;

			if (menu.hasClass('sliding-menu'))
			{
				return;
			}

			var menuWidth = menu.width();

			if (settings.dataJSON)
			{
				data = processJSON(settings.dataJSON);
			}
			else
			{
				data = process(menu);
			}

			menu.empty().addClass('sliding-menu');

			var rootPanel;

			if (settings.dataJSON)
			{
				$(data).each(function(index, item)
				{
					var panel = $('<ul></ul>');

					if (item.root)
					{
						rootPanel = '#' + item.id;
					}

					panel.attr('id', item.id);
					panel.addClass('menu-panel');
					panel.width(menuWidth);

					$(item.children).each(function(index, item)
					{
						var link = $('<a></a>');

						link.attr('class', item.styleClass);
						link.attr('href', item.href);
						link.text(item.label);

						var li = $('<li></li>');

						li.append(link);

						panel.append(li);

					});

					menu.append(panel);

				});
			}
			else
			{
				$(data).each(function(index, item)
				{
					var panel = $(item);

					if (panel.hasClass('menu-panel-root'))
					{
						rootPanel = '#' + panel.attr('id');
					}

					panel.width(menuWidth);

					menu.append(item);

				});
			}

			rootPanel = $(rootPanel);
			rootPanel.addClass('menu-panel-root');

			var currentPanel = rootPanel;

			menu.height(rootPanel.height());

			var wrapper = $('<div></div>').addClass('sliding-menu-wrapper').width(data.length * menuWidth);

			menu.wrapInner(wrapper);

			wrapper = $('.sliding-menu-wrapper', menu);

			$('a', self).on('click', function(e)
			{
				var href = $(this).attr('href'),
					label = $(this).text();

				if (wrapper.is(':animated'))
				{
					e.preventDefault();

					return;
				}

				if (href == '#')
				{
					e.preventDefault();
				}
				else if (href.indexOf('#menu-panel') == 0)
				{
					var target = $(href),
						isBack = $(this).hasClass('back'),
						marginLeft = parseInt(wrapper.css('margin-left'));

					if (isBack)
					{
						if (href == '#menu-panel-back')
						{
							target = currentPanel.prev();
						}

						wrapper.stop(true, true).animate(
						{
							marginLeft: marginLeft + menuWidth

						}, 'fast');
					}
					else
					{
						target.insertAfter(currentPanel);

						if (settings.backLabel === true)
						{
							$('.back', target).text(label);
						}
						else
						{
							$('.back', target).text(settings.backLabel);
						}

						wrapper.stop(true, true).animate(
						{
							marginLeft: marginLeft - menuWidth

						}, 'fast');
					}

					currentPanel = target;

					menu.stop(true, true).animate(
					{
						height: target.height()

					}, 'fast');

					e.preventDefault();
				}

			});

			return this;

		});

		function process(data)
		{
			var ul = $('ul', data),
				panels = [];

			$(ul).each(function(index, item)
			{
				var panel = $(item),
					handler = panel.prev(),
					id = getNewId();

				if (handler.length == 1)
				{
					handler.addClass('nav').attr('href', '#menu-panel-' + id);
				}

				panel.attr('id', 'menu-panel-' + id);

				if (index == 0)
				{
					panel.addClass('menu-panel-root');
				}
				else
				{
					panel.addClass('menu-panel');

					var li = $('<li></li>'),
						back = $('<a></a>').addClass('back').attr('href', '#menu-panel-back');

					panel.prepend(back);
				}

				panels.push(item);

			});

			return panels;
		}

		function processJSON(data, parent)
		{
			var root = { id: 'menu-panel-' + getNewId(), children: [], root: (parent ? false : true) },
				panels = [];

			if (parent)
			{
				root.children.push(
				{
					styleClass: 'back',
					href: '#' + parent.id

				});
			}

			$(data).each(function(index, item)
			{
				root.children.push(item);

				if (item.children)
				{
					var panel = processJSON(item.children, root);

					item.href = '#' + panel[0].id;
					item.styleClass = 'nav';

					panels = panels.concat(panel);
				}

			});

			return [root].concat(panels);
		}

		function getNewId()
		{
			var id;

			do
			{
				id = Math.random().toString(36).substring(3, 8);
			}
			while (usedIds.indexOf(id) >= 0);

			usedIds.push(id);

			return id;
		}

	};

} (jQuery));



/*
 * jQuery Navgoco Menus Plugin v0.2.1 (2014-04-11)
 * https://github.com/tefra/navgoco
 *
 * Copyright (c) 2014 Chris T (@tefra)
 * BSD - https://github.com/tefra/navgoco/blob/master/LICENSE-BSD
 */
(function($) {

	"use strict";

	/**
	 * Plugin Constructor. Every menu must have a unique id which will either
	 * be the actual id attribute or its index in the page.
	 *
	 * @param {Element} el
	 * @param {Object} options
	 * @param {Integer} idx
	 * @returns {Object} Plugin Instance
	 */
	var Plugin = function(el, options, idx) {
		this.el = el;
		this.$el = $(el);
		this.options = options;
		this.uuid = this.$el.attr('id') ? this.$el.attr('id') : idx;
		this.state = {};
		this.init();
		return this;
	};

	/**
	 * Plugin methods
	 */
	Plugin.prototype = {
		/**
		 * Load cookie, assign a unique data-index attribute to
		 * all sub-menus and show|hide them according to cookie
		 * or based on the parent open class. Find all parent li > a
		 * links add the carent if it's on and attach the event click
		 * to them.
		 */
		init: function() {
			var self = this;
			self._load();
			self.$el.find('ul').each(function(idx) {
				var sub = $(this);
				sub.attr('data-index', idx);
				if (self.options.save && self.state.hasOwnProperty(idx)) {
					sub.parent().addClass(self.options.openClass);
					sub.show();
				} else if (sub.parent().hasClass(self.options.openClass)) {
					sub.show();
					self.state[idx] = 1;
				} else {
					sub.hide();
				}
			});

			var caret = $('<span></span>').prepend(self.options.caretHtml);
			var links = self.$el.find("li > a");
			self._trigger(caret, false);
			self._trigger(links, true);
			self.$el.find("li:has(ul) > a").prepend(caret);
		},
		/**
		 * Add the main event trigger to toggle menu items to the given sources
		 * @param {Element} sources
		 * @param {Boolean} isLink
		 */
		_trigger: function(sources, isLink) {
			var self = this;
			sources.on('click', function(event) {
				event.stopPropagation();
				var sub = isLink ? $(this).next() : $(this).parent().next();
				var isAnchor = false;
				if (isLink) {
					var href = $(this).attr('href');
					isAnchor = href === undefined || href === '' || href === '#';
				}
				sub = sub.length > 0 ? sub : false;
				self.options.onClickBefore.call(this, event, sub);

				if (!isLink || sub && isAnchor) {
					event.preventDefault();
					self._toggle(sub, sub.is(":hidden"));
					self._save();
				} else if (self.options.accordion) {
					var allowed = self.state = self._parents($(this));
					self.$el.find('ul').filter(':visible').each(function() {
						var sub = $(this),
							idx = sub.attr('data-index');

						if (!allowed.hasOwnProperty(idx)) {
							self._toggle(sub, false);
						}
					});
					self._save();
				}
				self.options.onClickAfter.call(this, event, sub);
			});
		},
		/**
		 * Accepts a JQuery Element and a boolean flag. If flag is false it removes the `open` css
		 * class from the parent li and slides up the sub-menu. If flag is open it adds the `open`
		 * css class to the parent li and slides down the menu. If accordion mode is on all
		 * sub-menus except the direct parent tree will close. Internally an object with the menus
		 * states is maintained for later save duty.
		 *
		 * @param {Element} sub
		 * @param {Boolean} open
		 */
		_toggle: function(sub, open) {
			var self = this,
				idx = sub.attr('data-index'),
				parent = sub.parent();

			self.options.onToggleBefore.call(this, sub, open);
			if (open) {
				parent.addClass(self.options.openClass);
				sub.slideDown(self.options.slide);
				self.state[idx] = 1;

				if (self.options.accordion) {
					var allowed = self.state = self._parents(sub);
					allowed[idx] = self.state[idx] = 1;

					self.$el.find('ul').filter(':visible').each(function() {
						var sub = $(this),
							idx = sub.attr('data-index');

						if (!allowed.hasOwnProperty(idx)) {
							self._toggle(sub, false);
						}
					});
				}
			} else {
				parent.removeClass(self.options.openClass);
				sub.slideUp(self.options.slide);
				self.state[idx] = 0;
			}
			self.options.onToggleAfter.call(this, sub, open);
		},
		/**
		 * Returns all parents of a sub-menu. When obj is true It returns an object with indexes for
		 * keys and the elements as values, if obj is false the object is filled with the value `1`.
		 *
		 * @since v0.1.2
		 * @param {Element} sub
		 * @param {Boolean} obj
		 * @returns {Object}
		 */
		_parents: function(sub, obj) {
			var result = {},
				parent = sub.parent(),
				parents = parent.parents('ul');

			parents.each(function() {
				var par = $(this),
					idx = par.attr('data-index');

				if (!idx) {
					return false;
				}
				result[idx] = obj ? par : 1;
			});
			return result;
		},
		/**
		 * If `save` option is on the internal object that keeps track of the sub-menus states is
		 * saved with a cookie. For size reasons only the open sub-menus indexes are stored.		 *
		 */
		_save: function() {
			if (this.options.save) {
				var save = {};
				for (var key in this.state) {
					if (this.state[key] === 1) {
						save[key] = 1;
					}
				}
				cookie[this.uuid] = this.state = save;
				$.cookie(this.options.cookie.name, JSON.stringify(cookie), this.options.cookie);
			}
		},
		/**
		 * If `save` option is on it reads the cookie data. The cookie contains data for all
		 * navgoco menus so the read happens only once and stored in the global `cookie` var.
		 */
		_load: function() {
			if (this.options.save) {
				if (cookie === null) {
					var data = $.cookie(this.options.cookie.name);
					cookie = (data) ? JSON.parse(data) : {};
				}
				this.state = cookie.hasOwnProperty(this.uuid) ? cookie[this.uuid] : {};
			}
		},
		/**
		 * Public method toggle to manually show|hide sub-menus. If no indexes are provided all
		 * items will be toggled. You can pass sub-menus indexes as regular params. eg:
		 * navgoco('toggle', true, 1, 2, 3, 4, 5);
		 *
		 * Since v0.1.2 it will also open parents when providing sub-menu indexes.
		 *
		 * @param {Boolean} open
		 */
		toggle: function(open) {
			var self = this,
				length = arguments.length;

			if (length <= 1) {
				self.$el.find('ul').each(function() {
					var sub = $(this);
					self._toggle(sub, open);
				});
			} else {
				var idx,
					list = {},
					args = Array.prototype.slice.call(arguments, 1);
				length--;

				for (var i = 0; i < length; i++) {
					idx = args[i];
					var sub = self.$el.find('ul[data-index="' + idx + '"]').first();
					if (sub) {
						list[idx] = sub;
						if (open) {
							var parents = self._parents(sub, true);
							for (var pIdx in parents) {
								if (!list.hasOwnProperty(pIdx)) {
									list[pIdx] = parents[pIdx];
								}
							}
						}
					}
				}

				for (idx in list) {
					self._toggle(list[idx], open);
				}
			}
			self._save();
		},
		/**
		 * Removes instance from JQuery data cache and unbinds events.
		 */
		destroy: function() {
			$.removeData(this.$el);
			this.$el.find("li:has(ul) > a").unbind('click');
			this.$el.find("li:has(ul) > a > span").unbind('click');
		}
	};

	/**
	 * A JQuery plugin wrapper for navgoco. It prevents from multiple instances and also handles
	 * public methods calls. If we attempt to call a public method on an element that doesn't have
	 * a navgoco instance, one will be created for it with the default options.
	 *
	 * @param {Object|String} options
	 */
	$.fn.navgoco = function(options) {
		if (typeof options === 'string' && options.charAt(0) !== '_' && options !== 'init') {
			var callback = true,
				args = Array.prototype.slice.call(arguments, 1);
		} else {
			options = $.extend({}, $.fn.navgoco.defaults, options || {});
			if (!$.cookie) {
				options.save = false;
			}
		}
		return this.each(function(idx) {
			var $this = $(this),
				obj = $this.data('navgoco');

			if (!obj) {
				obj = new Plugin(this, callback ? $.fn.navgoco.defaults : options, idx);
				$this.data('navgoco', obj);
			}
			if (callback) {
				obj[options].apply(obj, args);
			}
		});
	};
	/**
	 * Global var holding all navgoco menus open states
	 *
	 * @type {Object}
	 */
	var cookie = null;

	/**
	 * Default navgoco options
	 *
	 * @type {Object}
	 */
	$.fn.navgoco.defaults = {
		caretHtml: '',
		accordion: false,
		openClass: 'open',
		save: true,
		cookie: {
			name: 'navgoco',
			expires: false,
			path: '/'
		},
		slide: {
			duration: 400,
			easing: 'swing'
		},
		onClickBefore: $.noop,
		onClickAfter: $.noop,
		onToggleBefore: $.noop,
		onToggleAfter: $.noop
	};
})(jQuery);




/*!
 * Theia Sticky Sidebar v1.2.2
 * https://github.com/WeCodePixels/theia-sticky-sidebar
 *
 * Glues your website's sidebars, making them permanently visible while scrolling.
 *
 * Copyright 2013-2014 WeCodePixels and other contributors
 * Released under the MIT license
 */

(function($) {
	"use strict";

	$.fn.theiaStickySidebar = function(options) {
		var defaults = {
			'containerSelector': '',
			'additionalMarginTop': 0,
			'additionalMarginBottom': 0,
			'updateSidebarHeight': true,
			'minWidth': 0
		};
		options = $.extend(defaults, options);

		// Validate options
		options.additionalMarginTop = parseInt(options.additionalMarginTop) || 0;
		options.additionalMarginBottom = parseInt(options.additionalMarginBottom) || 0;

		// Add CSS
		$('head').append($('<style>.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>'));

		this.each(function() {
			var o = {};
			o.sidebar = $(this);

			// Save options
			o.options = options || {};

			// Get container
			o.container = $(o.options.containerSelector);
			if (o.container.size() == 0) {
				o.container = o.sidebar.parent();
			}

			// Create sticky sidebar
			o.sidebar.parents().css('-webkit-transform', 'none'); // Fix for WebKit bug - https://code.google.com/p/chromium/issues/detail?id=20574
			o.sidebar.css({
				'position': 'relative',
				'overflow': 'visible',
				// The "box-sizing" must be set to "content-box" because we set a fixed height to this element when the sticky sidebar has a fixed position.
				'-webkit-box-sizing': 'border-box',
				'-moz-box-sizing': 'border-box',
				'box-sizing': 'border-box'
			});

			// Get the sticky sidebar element. If none has been found, then create one.
			o.stickySidebar = o.sidebar.find('.theiaStickySidebar');
			if (o.stickySidebar.length == 0) {
				o.sidebar.find('script').remove(); // Remove <script> tags, otherwise they will be run again on the next line.
				o.stickySidebar = $('<div>').addClass('theiaStickySidebar').append(o.sidebar.children());
				o.sidebar.append(o.stickySidebar);
			}

			// Get existing top and bottom margins and paddings
			o.marginTop = parseInt(o.sidebar.css('margin-top'));
			o.marginBottom = parseInt(o.sidebar.css('margin-bottom'));
			o.paddingTop = parseInt(o.sidebar.css('padding-top'));
			o.paddingBottom = parseInt(o.sidebar.css('padding-bottom'));

			// Add a temporary padding rule to check for collapsable margins.
			var collapsedTopHeight = o.stickySidebar.offset().top;
			var collapsedBottomHeight = o.stickySidebar.outerHeight();
			o.stickySidebar.css('padding-top', 1);
			o.stickySidebar.css('padding-bottom', 1);
			collapsedTopHeight -= o.stickySidebar.offset().top;
			collapsedBottomHeight = o.stickySidebar.outerHeight() - collapsedBottomHeight - collapsedTopHeight;
			if (collapsedTopHeight == 0) {
				o.stickySidebar.css('padding-top', 0);
				o.stickySidebarPaddingTop = 0;
			}
			else {
				o.stickySidebarPaddingTop = 1;
			}

			if (collapsedBottomHeight == 0) {
				o.stickySidebar.css('padding-bottom', 0);
				o.stickySidebarPaddingBottom = 0;
			}
			else {
				o.stickySidebarPaddingBottom = 1;
			}

			// We use this to know whether the user is scrolling up or down.
			o.previousScrollTop = null;

			// Scroll top (value) when the sidebar has fixed position.
			o.fixedScrollTop = 0;

			// Set sidebar to default values.
			resetSidebar();

			o.onScroll = function(o) {
				// Stop if the sidebar isn't visible.
				if (!o.stickySidebar.is(":visible")) {
					return;
				}

				// Stop if the window is too small.
				if ($('body').width() < o.options.minWidth) {
					resetSidebar();
					return;
				}

				// Stop if the sidebar width is larger than the container width (e.g. the theme is responsive and the sidebar is now below the content)
				if (o.sidebar.outerWidth(true) + 50 >  o.container.width()) {
					resetSidebar();
					return;
				}

				var scrollTop = $(document).scrollTop();
				var position = 'static';

				// If the user has scrolled down enough for the sidebar to be clipped at the top, then we can consider changing its position.
				if (scrollTop >= o.container.offset().top + (o.paddingTop + o.marginTop - o.options.additionalMarginTop)) {
					// The top and bottom offsets, used in various calculations.
					var offsetTop = o.paddingTop + o.marginTop + options.additionalMarginTop;
					var offsetBottom =  o.paddingBottom + o.marginBottom + options.additionalMarginBottom;

					// All top and bottom positions are relative to the window, not to the parent elemnts.
					var containerTop = o.container.offset().top;
					var containerBottom = o.container.offset().top + getClearedHeight(o.container);

					// The top and bottom offsets relative to the window screen top (zero) and bottom (window height).
					var windowOffsetTop = 0 + options.additionalMarginTop;
					var windowOffsetBottom;

					var sidebarSmallerThanWindow = (o.stickySidebar.outerHeight() + offsetTop + offsetBottom) < $(window).height();
					if (sidebarSmallerThanWindow) {
						windowOffsetBottom = windowOffsetTop + o.stickySidebar.outerHeight();
					}
					else {
						windowOffsetBottom = $(window).height() - o.marginBottom - o.paddingBottom - options.additionalMarginBottom;
					}

					var staticLimitTop = containerTop - scrollTop + o.paddingTop + o.marginTop;
					var staticLimitBottom = containerBottom - scrollTop - o.paddingBottom - o.marginBottom;

					var top = o.stickySidebar.offset().top - scrollTop;
					var scrollTopDiff = o.previousScrollTop - scrollTop;

					// If the sidebar position is fixed, then it won't move up or down by itself. So, we manually adjust the top coordinate.
					if (o.stickySidebar.css('position') == 'fixed') {
						top += scrollTopDiff;
					}

					if (scrollTopDiff > 0) { // If the user is scrolling up.
						top = Math.min(top, windowOffsetTop);
					}
					else { // If the user is scrolling down.
						top = Math.max(top, windowOffsetBottom - o.stickySidebar.outerHeight());
					}

					top = Math.max(top, staticLimitTop);

					top = Math.min(top, staticLimitBottom - o.stickySidebar.outerHeight());

					// If the sidebar is the same height as the container, we won't use fixed positioning.
					var sidebarSameHeightAsContainer = o.container.height() == o.stickySidebar.outerHeight();

					if (!sidebarSameHeightAsContainer && top == windowOffsetTop) {
						position = 'fixed';
					}
					else if (!sidebarSameHeightAsContainer && top == windowOffsetBottom - o.stickySidebar.outerHeight()) {
						position = 'fixed';
					}
					else if (scrollTop + top - o.sidebar.offset().top - o.paddingTop <= options.additionalMarginTop) {
						position = 'static';
					}
					else {
						position = 'absolute';
					}
				}

				/*
				 * Performance notice: It's OK to set these CSS values at each resize/scroll, even if they don't change.
				 * It's way slower to first check if the values have changed.
				 */
				if (position == 'fixed') {
					o.stickySidebar.css({
						'position': 'fixed',
						'width': o.sidebar.width(),
						'top': top,
						'left': o.sidebar.offset().left + parseInt(o.sidebar.css('padding-left'))
					});
				}
				else if (position == 'absolute') {
					var css = {};

					if (o.stickySidebar.css('position') != 'absolute') {
						css.position = 'absolute';
						css.top = scrollTop + top - o.sidebar.offset().top - o.stickySidebarPaddingTop - o.stickySidebarPaddingBottom;
					}

					css.width = o.sidebar.width();
					css.left = '';

					o.stickySidebar.css(css);
				}
				else if (position == 'static') {
					resetSidebar();
				}

				if (position != 'static') {
					if (o.options.updateSidebarHeight == true) {
						o.sidebar.css({
							'min-height': o.stickySidebar.outerHeight() + o.stickySidebar.offset().top - o.sidebar.offset().top + o.paddingBottom
						});
					}
				}

				o.previousScrollTop = scrollTop;
			};

			// Initialize the sidebar's position.
			o.onScroll(o);

			// Recalculate the sidebar's position on every scroll and resize.
			$(document).scroll(function(o) {
				return function() {
					o.onScroll(o);
				};
			}(o));
			$(window).resize(function(o) {
				return function() {
					o.stickySidebar.css({'position': 'static'});
					o.onScroll(o);
				};
			}(o));

			// Reset the sidebar to its default state
			function resetSidebar() {
				o.fixedScrollTop = 0;
				o.sidebar.css({
					'min-height': '1px'
				});
				o.stickySidebar.css({
					'position': 'static',
					'width': ''
				});
			}

			// Get the height of a div as if its floated children were cleared. Note that this function fails if the floats are more than one level deep.
			function getClearedHeight(e) {
				var height = e.height();

				e.children().each(function() {
					height = Math.max(height, $(this).height());
				});

				return height;
			}
		});
	}
})(jQuery);