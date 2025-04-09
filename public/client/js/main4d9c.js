window.awe = window.awe || {};
awe.init = function () {
	awe.showPopup();
	awe.hidePopup();	
};
$(document).ready(function() {
	awe_category();
	awe_backtotop();
	$(window).on('load resize', function () {
		resizeImage();
	});

	function resizeImage() {
		setTimeout(function(){
			$('.item_product_main:not(.viewed) .product-thumbnail').each(function(){
				var thumbset = $(this).find('.image_thumb');
				thumbset.css({'height':thumbset.width()+'px'});
			})
		},200);
	}

	/* Menu sidebar */
	$('.plus-nClick1').click(function(e){
		e.preventDefault();
		$(this).parents('.level0').toggleClass('opened');
		$(this).parents('.level0').children('ul').slideToggle(200);
	});
	$('.plus-nClick2').click(function(e){
		e.preventDefault();
		$(this).parents('.level1').toggleClass('opened');
		$(this).parents('.level1').children('ul').slideToggle(200);
	});
	$('.plus-nClick3').click(function(e){
		e.preventDefault();
		$(this).parents('.level2').toggleClass('opened');
		$(this).parents('.level2').children('ul').slideToggle(200);
	});
	var wDWs = $(window).width();
	if (wDWs < 767) {
		$('.footer-click h4').click(function(e){
			$(this).toggleClass('current');
			$(this).next('div').toggleClass("current");
		});
	}

	if (wDWs < 992) {
		$('.close-menu, .opacity_menu').on('click', function(){
			$('.header-mid').removeClass('current');
			$('.opacity_menu').removeClass('current');
		})
		$('#site-menu-handle').on('click', function(){
			$('.header-mid').addClass('current');
			$('.opacity_menu').addClass('current');
		})
		$('.menuList-main li .fa').click(function(e){
			if($(this).hasClass('current')) {
				$(this).closest('ul').find('li, .fa').removeClass('current');
			} else {
				$(this).closest('ul').find('li, .fa').removeClass('current');
				$(this).closest('li').addClass('current');
				$(this).addClass('current');
			}
		});
	}

	$('.scroll-down').on('click', function () {
		var dataHref = $(this).data('href'),
			extraHeader = 0;
		if ($(window).width() >= 1200) {
			extraHeader = 10
		}
		$('html, body').animate({
			scrollTop: $(dataHref).offset().top - extraHeader
		}, 800);
	});
});

var wDWs = $(window).width();
if (wDWs < 1199) {
	/*Remove html mobile*/
	$('.quickview-product').remove();
}

$(document).ready(function() {
	var margin_left = 0;
	$('#prev').on('click', function(e) {
		e.preventDefault();
		animateMargin( 190 );
	});
	$('#next').on('click', function(e) {
		e.preventDefault();
		animateMargin( -190 );
	});
	const animateMargin = ( amount ) => {
		margin_left = Math.min(0, Math.max( getMaxMargin(), margin_left + amount ));
		$('ul.menuList-main').animate({
			'margin-left': margin_left
		}, 300);
	};
	const getMaxMargin = () => 
	$('ul.menuList-main').parent().width() - $('ul.menuList-main')[0].scrollWidth;
})

$('.quenmk').on('click', function() {
	$('#login').toggleClass('hidden');
	$('.h_recover').slideToggle();
});

window.awe = window.awe || {};
function awe_convertVietnamese(str) { 
	str= str.toLowerCase();
	str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
	str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
	str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
	str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
	str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
	str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
	str= str.replace(/đ/g,"d"); 
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
	str= str.replace(/-+-/g,"-");
	str= str.replace(/^\-+|\-+$/g,""); 
	return str; 
} window.awe_convertVietnamese=awe_convertVietnamese;

function awe_category(){
	$('.nav-category .fa-angle-right').click(function(e){
		$(this).toggleClass('fa-angle-down fa-angle-right');
		$(this).parent().toggleClass('active');
	});
	$('.nav-category .fa-angle-down').click(function(e){
		$(this).toggleClass('fa-angle-right');
		$(this).parent().toggleClass('active');
	});
} window.awe_category=awe_category;

function awe_showLoading(selector) {
	var loading = $('.loader').html();
	$(selector).addClass("loading").append(loading); 
}  window.awe_showLoading=awe_showLoading;

function awe_hideLoading(selector) {
	$(selector).removeClass("loading"); 
	$(selector + ' .loading-icon').remove();
}  window.awe_hideLoading=awe_hideLoading;

function awe_showPopup(selector) {
	$(selector).addClass('active');
}  window.awe_showPopup=awe_showPopup;

function awe_hidePopup(selector) {
	$(selector).removeClass('active');
}  window.awe_hidePopup=awe_hidePopup;

function awe_backtotop() { 
	$(window).scroll(function() {
		$(this).scrollTop() > 200 ? $('.backtop').addClass('show') : $('.backtop').removeClass('show')
	});
	$('.backtop').click(function() {
		return $("body,html").animate({
			scrollTop: 0
		}, 800), !1
	});
} window.awe_backtotop=awe_backtotop;

var SuccessNoti = function(SuccessText){
	$.notify({
		// options
		title: '<strong>Tuyệt vời</strong><br>',
		message: SuccessText,
		icon: 'glyphicon glyphicon-ok'
	},{
		// settings
		element: 'body',
		//position: null,
		type: "success",
		//allow_dismiss: true,
		//newest_on_top: false,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "right"
		},
		offset: 20,
		spacing: 10,
		z_index: 1031,
		delay: 3300,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutRight'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
	});
}
var InfoNoti = function(InfoText){
	$.notify({
		// options
		title: '<strong>Thông báo</strong><br>',
		message: InfoText,
		icon: 'glyphicon glyphicon-info-sign',
	},{
		// settings
		element: 'body',
		position: null,
		type: "info",
		allow_dismiss: true,
		newest_on_top: false,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "right"
		},
		offset: 20,
		spacing: 10,
		z_index: 1031,
		delay: 3300,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated bounceInDown',
			exit: 'animated bounceOutUp'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
	});
}
var ErrorNoti = function(ErrorText){
	$.notify({
		// options
		title: '<strong>Thông báo</strong><br',
		message: ErrorText,
		icon: 'glyphicon glyphicon-info-sign',
	},{
		// settings
		element: 'body',
		position: null,
		type: "warning",
		allow_dismiss: true,
		newest_on_top: false,
		showProgressbar: false,
		placement: {
			from: "top",
			align: "right"
		},
		offset: 20,
		spacing: 10,
		z_index: 1031,
		delay: 3300,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated bounceInDown',
			exit: 'animated bounceOutUp'
		},
		onShow: null,
		onShown: null,
		onClose: null,
		onClosed: null,
		icon_type: 'class',
	});


	
}


