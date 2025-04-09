$(document).ready(function ($) {
	$('.section_base .button_show_tab').on('click', function(e){
		e.preventDefault();
		var $this = $(this);
		$this.parents('.section_base .section-head').find('.viewallcat').stop().slideToggle();
		$(this).toggleClass('active')
		return false;
	});


});

/*Ajax tab 1*/
$(".not-dqtab").each( function(e){
	/*khai báo khởi tạo ban đầu cho 2 kiểu tab*/
	var $this1 = $(this);
	var $this2 = $(this);
	var datasection = $this1.closest('.not-dqtab').attr('data-section');
	$this1.find('.tabs-title li:first-child').addClass('current');
	$this1.find('.tab-content').first().addClass('current');
	var datasection2 = $this2.closest('.not-dqtab').attr('data-section-2');
	$this2.find('.tabs-title li:first-child').addClass('current');
	$this2.find('.tab-content').first().addClass('current');

	/*khai báo cho chức năng dành cho mobile tab*/
	var _this = $(this).find('.wrap_tab_index .title_module_main');
	var droptab = $(this).find('.link_tab_check_click');

	/*type 1*/ //kiểu 1 này thì load có owl carousel
	$this1.find('.tabtitle1.ajax li').click(function(){
		var $this2 = $(this),
			tab_id = $this2.attr('data-tab'),
			url = $this2.attr('data-url');
		var etabs = $this2.closest('.e-tabs');
		etabs.find('.tab-viewall').attr('href',url);
		etabs.find('.tabs-title li').removeClass('current');
		etabs.find('.tab-content').removeClass('current');
		$this2.addClass('current');
		etabs.find("."+tab_id).addClass('current');
		//Nếu đã load rồi thì không load nữa
		if(!$this2.hasClass('has-content')){
			$this2.addClass('has-content');		
			getContentTab(url,"."+ datasection+" ."+tab_id);
		}
	});
	$this2.find('.tabtitle2.ajax li').click(function(){
		var $this2 = $(this),
			tab_id = $this2.attr('data-tab'),
			url = $this2.attr('data-url');
		var etabs = $this2.closest('.e-tabs');
		etabs.find('.tab-viewall').attr('href',url);
		etabs.find('.tabs-title li').removeClass('current');
		etabs.find('.tab-content').removeClass('current');
		$this2.addClass('current');
		etabs.find("."+tab_id).addClass('current');
		//Nếu đã load rồi thì không load nữa
		if(!$this2.hasClass('has-content')){
			$this2.addClass('has-content');		
			getContentTab2(url,"."+ datasection2+" ."+tab_id);
		}
	});

});

// Get content cho tab
function getContentTab(url,selector){
	url = url+"?view=ajaxload";
	var loading = '<div class="a-center"><img src="//bizweb.dktcdn.net/100/455/315/themes/894917/assets/rolling.svg?1723540086975" alt="loading"/></div>';
	$.ajax({
		type: 'GET',
		url: url,
		beforeSend: function() {
			$(selector).html(loading);
		},
		success: function(data) {
			var content = $(data);
			setTimeout(function(){
				$(selector).html(content.html());
				ajaxSwiper(selector);
				awe_lazyloadImage();
				resizeImage();
				$(selector + ' .add_to_cart').click(function(e){
					e.preventDefault();		
					var $this = $(this);
					var form = $this.parents('form');	
					$.ajax({
						type: 'POST',
						url: '/cart/add.js',
						async: false,
						data: form.serialize(),
						dataType: 'json',
						beforeSend: function() { },
						success: function(line_item) {
							$('.cart-popup-name').html(line_item.title).attr('href', line_item.url, 'title', line_item.title);
							ajaxCart.load();
							$('#popup-cart-desktop, .cart-sidebars, .backdrop__body-backdrop___1rvky').addClass('active');
						},
						cache: false
					});
				});
			},500);
		},
		dataType: "html"
	});
}
// Get content cho tab
function getContentTab2(url,selector){
	url = url+"?view=ajaxload2";
	var loading = '<div class="a-center"><img src="//bizweb.dktcdn.net/100/455/315/themes/894917/assets/rolling.svg?1723540086975" alt="loading"/></div>';
	$.ajax({
		type: 'GET',
		url: url,
		beforeSend: function() {
			$(selector).html(loading);
		},
		success: function(data) {
			var content = $(data);
			setTimeout(function(){
				$(selector).html(content.html());
				ajaxSwiper2(selector);
				awe_lazyloadImage();
				resizeImage();
				if(window.BPR)
					return window.BPR.initDomEls(), window.BPR.loadBadges();
				$(selector + ' .add_to_cart').click(function(e){
					e.preventDefault();		
					var $this = $(this);
					var form = $this.parents('form');	
					$.ajax({
						type: 'POST',
						url: '/cart/add.js',
						async: false,
						data: form.serialize(),
						dataType: 'json',
						beforeSend: function() { },
						success: function(line_item) {
							ajaxCart.load();
							$('.cart-popup-name').html(line_item.title).attr('href', line_item.url, 'title', line_item.title);
							$('#popup-cart-desktop, .cart-sidebars, .backdrop__body-backdrop___1rvky').addClass('active');
						},
						cache: false
					});
				});
			},500);
		},
		dataType: "html"
	});
}
// Ajax carousel
function ajaxSwiper(selector,dataLgg){
	$(selector+' .swipertab').each( function(){
		var swiperTab = new Swiper('.swipertab', {
			slidesPerView: 5,
			spaceBetween: 20,
			slidesPerColumn: 2,
			slidesPerColumnFill: 'row',
			breakpoints: {
				300: {
					slidesPerView: 2,
					slidesPerColumnFill: 'row',
					slidesPerColumn: 2,
					spaceBetween: 20
				},
				767: {
					slidesPerView: 2,
					slidesPerColumnFill: 'row',
					slidesPerColumn: 2,
					spaceBetween: 20
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 20
				},
				1024: {
					slidesPerView: 5,
					spaceBetween: 20
				}
			}
		});
	})
}
function ajaxSwiper2(selector,dataLgg){
	$(selector+' .swipertab2').each( function(){
		var swiperTab = new Swiper('.swipertab2', {
			slidesPerView: 3,
			spaceBetween: 20,
			slidesPerColumn: 2,
			slidesPerColumnFill: 'row',
			breakpoints: {
				300: {
					slidesPerView: 2,
					slidesPerColumnFill: 'row',
					slidesPerColumn: 2,
					spaceBetween: 20
				},
				767: {
					slidesPerView: 2,
					slidesPerColumnFill: 'row',
					slidesPerColumn: 2,
					spaceBetween: 20
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 20
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 20
				}
			}
		});
	})
}
window.addEventListener('DOMContentLoaded', (event) => {
	var swiperCarousel = new Swiper('.swiper-carousel', {
		slidesPerView: 5,
		spaceBetween: 20,
		slidesPerColumn: 2,
		slidesPerColumnFill: 'row',
		breakpoints: {
			300: {
				slidesPerView: 2,
				slidesPerColumnFill: 'row',
				slidesPerColumn: 2,
				spaceBetween: 20
			},
			767: {
				slidesPerView: 2,
				slidesPerColumnFill: 'row',
				slidesPerColumn: 2,
				spaceBetween: 20
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			1024: {
				slidesPerView: 4,
				spaceBetween: 20
			},
			1200: {
				slidesPerView: 5,
				spaceBetween: 20
			}
		}
	});
});
window.addEventListener('DOMContentLoaded', (event) => {
	var swiperCarousel = new Swiper('.swiper-carousel2', {
		slidesPerView: 3,
		spaceBetween: 20,
		slidesPerColumn: 2,
		slidesPerColumnFill: 'row',
		breakpoints: {
			300: {
				slidesPerView: 2,
				slidesPerColumnFill: 'row',
				slidesPerColumn: 2,
				spaceBetween: 20
			},
			767: {
				slidesPerView: 2,
				slidesPerColumnFill: 'row',
				slidesPerColumn: 2,
				spaceBetween: 20
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			1024: {
				slidesPerView: 3,
				spaceBetween: 20
			}
		}
	});
});