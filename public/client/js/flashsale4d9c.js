function FlashSale (){
	if(!window.falshSale) return
	Date.prototype.addDays = function(days) {
		var date = new Date(this.valueOf());
		date.setDate(date.getDate() + days);
		return date;
	}
	Date.prototype.addHours = function(hours) {
		this.setTime(this.getTime() + ((hours)*60*60*1000));
		return this; 
	}
	const getDays = (times) => Math.floor((times / (1000 * 60 * 60 * 24))) 
	const getHours =  (times) => Math.floor((times % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	const getMinutes  = (times) => Math.floor((times % (1000 * 60 * 60)) / (1000 * 60));
	const getSeconds = (times) => Math.floor((times % (1000 * 60)) / 1000);
	function randomQty() {
		var minQty = +window.falshSale.percentMin;
		var maxQty = +window.falshSale.percentMax;
		minQty = Math.ceil(minQty);
		maxQty = Math.floor(maxQty);
		var qty = Math.floor(Math.random() * (maxQty - minQty + 1)) + minQty;
		qty = parseInt(qty);
		if (qty <= minQty) {
			qty = minQty;
		}
		if (qty > maxQty) {
			qty = maxQty;
		}
		return qty
	}
	function renderProgress(item) {
		let id = $(item).data('pdid')
		let inventory = parseInt($(item).data('inventoryQuantity'))
		let available = $(item).data('available')
		let management = $(item).data('management')
		let soldQuantity = $(item).data('soldQuantity')
		let progress = $(item).find('.flashsale___percent')
		let soldNumber = $(item).find('.flashsale__sold-qty')
		let label = $(item).find('.flashsale__label')
		let maxInStock = parseInt(window.falshSale.maxInStock)
		let percent, stock, soldQty
		flashSaleStorage[id] = flashSaleStorage.hasOwnProperty(id) ? flashSaleStorage[id] : {}
		if(flashSaleStorage[id] && management && flashSaleStorage[id].inventory !== inventory){
			if( flashSaleStorage[id].inventory > inventory ){
				flashSaleStorage[id].soldQty = flashSaleStorage[id].soldQty + flashSaleStorage[id].inventory - inventory;

			}else{
				flashSaleStorage[id] = {}
			}
		}
		if (useSoldQuantity) {
			soldQty = parseInt(soldQuantity)
			stock =  parseInt(inventory) + soldQty	
			percent = Math.round(soldQty * 100 / stock)
		} else {
			stock =	flashSaleStorage[id].stock || maxInStock
			percent = !flashSaleStorage[id].soldQty ? randomQty()  : Math.round(flashSaleStorage[id].soldQty * 100 / stock)
			soldQty = !flashSaleStorage[id].soldQty ? Math.round(percent * stock / 100) : flashSaleStorage[id].soldQty
			if( Math.round(inventory *100 / maxInStock ) <= 2 ){
				percent = 98
			}
		}
		if(!available && inventory == 0){
			percent = 100
		}
		if(available && inventory <= 0){
			percent = 98
		}
		flashSaleStorage[id].soldQty = soldQty
		flashSaleStorage[id].timestamp = !flashSaleStorage[id].timestamp ? new Date().getTime() : flashSaleStorage[id].timestamp
		flashSaleStorage[id].stock = stock
		flashSaleStorage[id].inventory = inventory
		flashSaleStorage[id].mangement = management
		if(quantityType !== 'inventory'){
			percent = percent == 100 && available ? 90 : percent
			progress.css('width', `${percent < 90  || (percent > 90 && percent < 100) ? percent : 90}%`)
			if (percent >= 98) {
				//label.html(' ⚡  Sắp hết hàng')
			}

			if (percent == 100 || !available) {
				label.html('Hết hàng')
				progress.css('width', `100%`)
			}
		}else{
			percent = 100 - percent
			percent = percent == 0 && available ? 10 : percent
			progress.css('width', `${percent > 10  || (percent > 0 && percent < 10) ? percent : 10}%`)
			if (percent <= 10) {
				//label.html(' ⚡  Sắp hết hàng')
			}

			if (percent == 0 || !available) {
				label.html('Hết hàng')
				progress.css('width', `100%`)
			}
		}
		if (!useSoldQuantity) soldNumber.text(quantityType == 'inventory' ? stock - soldQty : soldQty)
			}
	function updateQty() {
		if (flashSaleStorage && Object.keys(flashSaleStorage).length) {
			Object.keys(flashSaleStorage).map(key => {
				let item = flashSaleStorage[key]
				let current = new Date().getTime()
				let distance = (current - item.timestamp) / 1000 / 60
				let qty = distance  > loopTime ? Math.round(distance / loopTime) : 0
				if(!item.mangement ){ item.soldQty += qty
				item.soldQty = item.soldQty > item.stock ? item.stock : item.soldQty
				item.timestamp = distance > loopTime ? current : item.timestamp
									}
			})
			localStorage.setItem('flashSaleStorageItem', JSON.stringify(flashSaleStorage))
			return flashSaleStorage
		}
		return 

	}
	function renderCountDown(distance) {
		let html = [];
		let days = getDays(distance) 
		let hours = `<span>${getHours(distance) >= 10 ? getHours(distance) : `0${getHours(distance)}`}</span>`
		let minutes = `<span>${getMinutes(distance) >= 10 ? getMinutes(distance) : `0${getMinutes(distance)}`}</span>`
		let seconds = `<span>${ getSeconds(distance) >= 10 ? getSeconds(distance) : `0${getSeconds(distance)}`}</span>`
		html = [hours,minutes,seconds]
		if(days > 0 ) html.unshift(`${days >= 10 ? days : `0${days}`}`)
		return `${html.join(`:`)}`;
	}
	function calcCountDown(startTime, endTime){
		let distance = 0
		let now = new Date().getTime()
		if(now >= startTime && now <= endTime ){
			distance = (endTime - now);

			return distance
		}
		return distance
	}
	let now = new Date()
	let loopTime = 6;
	let {type, 
		 dateStart, 
		 dateFinish,
		 hourStart,
		 hourFinish,
		 activeDay,
		 finishAction,
		 useSoldQuantity,
		 quantityType
		} = window.falshSale

	var flashSaleStorage = JSON.parse(localStorage.getItem('flashSaleStorageItem')) || {}
	let flashSaleSetting = JSON.parse(localStorage.getItem('flashSale')) || {}
	if (JSON.stringify(flashSaleSetting) != JSON.stringify(window.falshSale)) {
		let setting1 =  Object.assign({},flashSaleSetting)
		let setting2 = Object.assign({},window.falshSale)
		let storageDate = flashSaleSetting.timestamp
		if((+activeDay === 7	&& !storageDate) ||
		   (new Date(storageDate).getDay() !== new Date().getDay())){
			flashSaleStorage = {}
		}
		delete	setting1.timestamp
		delete	setting2.timestamp
		if(JSON.stringify(setting1) != JSON.stringify(setting2)){
			flashSaleStorage = {}
		}
	}
	localStorage.setItem('flashSale', JSON.stringify(window.falshSale))

	let distance = 0, startTime, endTime;
	if(type === 'hours' && ( new Date().getDay() === +activeDay || +activeDay === 7 ) ){
		hourStart = hourStart.split(':')
		startTime = new Date().setHours(hourStart[0] != '24' ? hourStart[0] : '00' ,hourStart[1] || '00','00')
		endTime =  new Date(startTime).addHours(+hourFinish).getTime();
		distance = calcCountDown(startTime, endTime);
		if(	distance > 0){
			setInterval(function(){
				distance = calcCountDown(startTime, endTime);
				$(`.timein`).html(renderCountDown(distance))
			},1000)
			$(`.timein`).html(renderCountDown(distance))

		}
	}

	if (type === 'days') {
		$('.timein').map(function(e){
			var dataTime = $(this).data('time');
			var countDownDate = new Date(dataTime).getTime();
			var codetime = $(this);
			var x = setInterval(function() {
				var now = new Date().getTime();
				var distance = countDownDate - now;
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				$(codetime).html("<span>"+days+"</span>:" +"<span>"+hours+"</span>:" + "<span>"+minutes+"</span>:" + "<span>"+seconds+"</span>");
			}, 1000);
		});
	}

	if (distance > 0) {
		var isRendered = !useSoldQuantity &&  updateQty()
		$('.flashsale__item').each(function () { renderProgress(this) })
		if (!useSoldQuantity) {
			let start = 0
			setInterval(function () {
				if(start){
					updateQty()
					$('.flashsale__item').each(function () { 
						renderProgress(this) 
					})
				}
				start +=1
			}, loopTime * 1000)
		}
		$(`.flashsale__bottom`).show();
		!isRendered && localStorage.setItem('flashSaleStorageItem', JSON.stringify(flashSaleStorage))
	}
}
let isload = 0;
$(document).ready(()=>{
	var swiperwish = new Swiper('.deal-hot-swiper', {
		slidesPerView: 3,
		loop: false,
		grabCursor: true,
		spaceBetween: 30,
		slidesPerColumn: 2,
		slidesPerColumnFill: 'row',
		roundLengths: true,
		slideToClickedSlide: false,
		navigation: {
			nextEl: '.deal-hot-swiper .swiper-button-next',
			prevEl: '.deal-hot-swiper .swiper-button-prev',
		},
		pagination: {
			el: '.section_flash_sale .block-product .swiper-pagination',
			clickable: true,
		},
		autoplay: false,
		breakpoints: {
			300: {
				slidesPerView: 2,
				spaceBetween: 30
			},
			500: {
				slidesPerView: 2,
				spaceBetween: 30
			},
			640: {
				slidesPerView: 2,
				spaceBetween: 30
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 30
			},
			991: {
				slidesPerView: 3,
				spaceBetween: 30
			},
			1200: {
				slidesPerView: 3,
				spaceBetween: 30
			}
		}
	});
	try{
		FlashSale()
	}catch(e){
		console.log(e)
	}
})