
(function (window, $) {



	$(function () {


		/**
		 *  Mobile navigation via select menu  
		 */
		jQuery('select.select-navigator').change(function () {
			var val = jQuery(this).val();
			if ('0' !== val) window.location = val;
		});


		/**
		 *  This handles the ajax select menus for case studies
		 */
		jQuery('select[name=parent_cat]').change(function () {
			var $select = jQuery(this)
			var selected_cat = parseInt($select.val());
			if (selected_cat !== 0) {
				var $sub_select = jQuery('select[name=sub_cat]');
				if (!$sub_select.get(0)) {
					$select.parent().after('<div class="select-wrapper"><select class="study-category-select" name="sub_cat"></select></div>');
					$sub_select = jQuery('select[name=sub_cat]');
				}

				$sub_select.html('<option>Loading...</option>');

				jQuery.ajax({
					url : window.site_url+'/wp-admin/admin-ajax.php',
		                	type:'POST',
		                	data:'action=ajax_get_sub_categories&cat_id=' + selected_cat,
					success : function (results) {
						$sub_select.empty().html(results);
					},
				});
			}
		});

	
		

		jQuery('.scrollto').click(function(event){		
			event.preventDefault();
			jQuery('html,body').animate({
				scrollTop : jQuery(this.hash).offset().top
			}, 500);
		});


		jQuery('#toc-inner').toc({
		    'selectors': 'h1,h2,h3', //elements to use as headings
		    'container': 'article.post', //element to find all selectors in
		    'smoothScrolling': true, //enable or disable smooth scrolling on click
		    'prefix': 'toc', //prefix for anchor tags and class names
		    'onHighlight': function(el) {}, //called when a new section is highlighted 
		    'highlightOnScroll': true, //add class to heading that is currently in focus
		    'highlightOffset': 100, //offset to trigger the next headline
		    'anchorName': function(i, heading, prefix) { //custom function for anchor name
		        return prefix+i;
		    },
		    'headerText': function(i, heading, $heading) { //custom function building the header-item text
		        return $heading.text();
		    },
			'itemClass': function(i, heading, $heading, prefix) { // custom function for item class
		  		return $heading[0].tagName.toLowerCase();
		  	}
		});


		$('.ajax-pager a').click(function (e) {
			e.preventDefault();
			var $this = $(this),
				pager = $this.parents('nav.study-pager'),
				next_page = pager.find('a.next');

			if (next_page.get(0)) {

				$this.text('Loading...');
				$.get(next_page.attr('href'), function (resp) {
					var new_content = $('div.case-studies-list', resp).html();
					$('#content div.case-studies-list').append(new_content);
					var next_url = $('nav.study-pager a.next', resp).attr('href');
					if (next_url) {
						next_page.attr('href', next_url);
						$this.text('Load more results');
					} else {
						pager.remove();
					}
				})
			}
		});


		$('#clients a.model-logo').hover(function () {
			var $this = $(this),
				id = $this.attr('data-model'),
				el_offset = $this.offset(),
				content_offset = $('#content').offset(),
				css = {'top' :(el_offset.top -  content_offset.top), 'left': 'auto'},
				tooltip = $('div.model-rollover[data-model='+id+']');

				if (1023 > $(window).width()) {
					css['left'] = ($this.parent().width() / 2) - (tooltip.width() / 2) + 'px !important';
					css['top'] = (css['top'] + ($this.height() || 80)) + 'px';
					tooltip.css('cssText', 'left:'+css.left+';top:'+css.top+';').show();
				} else {
					$('div.model-rollover[data-model='+id+']').css(css).show();		
				}
			
		}, function () {
			$('div.model-rollover[data-model='+$(this).attr('data-model')+']').hide();
		});


		/**
		 * This handles the positioning of the sticky navigation for Frame Creation Model and Related Theory pages.
		 */

		$.fn.stickyNav = function () {
			return this.each(function () {
				var el = $(this);

				el.data('original_offsets', el.offset());
				$.position_sticky(el);

				$(window).scroll(function () {
					$.position_sticky(el);
				});
			});
		};

		$.position_sticky = function (el) {
			var scroll_pos = $(document).scrollTop(),
				original_offsets = el.data('original_offsets');

			if (scroll_pos > original_offsets.top && 'fixed' !== el.css('position')) {
				var sticky_offsets = el.offset();
				el.css({
					'position' : 'fixed',
					'left' : sticky_offsets.left,
					'top' : '35px'
				});
			}

			if (scroll_pos < original_offsets.top && 'fixed' == el.css('position')) {
				el.css({
					'position' : 'relative',
					'left' : 'auto',
					'top' : 'auto'
				});
			}
		};	

		$('aside.scroll, div#toc').stickyNav();



		$('#caseStudiesNews div.select-wrapper select').change(function () {
			var button = $(this).parents('form').find('button');

			if (!button.is(':visible')) {
				button.show();
			}
		});


		$('div.contact-form').on('click', 'div.file-upload-widget > *', function () {
			$(this).parents('form').find('input[type=file]').trigger('click');

			return false;
		});

		$('div.contact-form').on('change', '#field_1_5 input[type=file]', function () {
			if (this.files[0] && this.files[0].name) {
				$(this).parents('form').find('div.file-upload-widget input[type=text]').val(this.files[0].name);
			}
		});

	});

})(window, jQuery);




