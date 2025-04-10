$(function() {	  
	$('#sortBy').bind('change', function() {		
		var url      = window.location.href;
		url = replaceUrlParam(url, 'sortby', $(this).val());		
		window.location.href = url;		 
	});
	$('.switch-view').bind('click',function(){
		var url      = window.location.href;
		url = replaceUrlParam(url, 'view', $(this).data('view'));
		window.location.href = url;
	});
	function replaceUrlParam(url, paramName, paramValue) {
		var pattern = new RegExp('('+paramName+'=).*?(&|$)'),
			newUrl = url.replace(pattern,'$1' + paramValue + '$2');
		if ( newUrl == url ) {
			newUrl = newUrl + (newUrl.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
		}
		return newUrl;
	}

	$(document).ready(function ($) {
		function getParameterByName( name,href )
		{
			name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
			var regexS = "[\\?&]"+name+"=([^&#]*)";
			var regex = new RegExp( regexS );
			var results = regex.exec( href );
			if( results == null )
				return "";
			else
				return decodeURIComponent(results[1].replace(/\+/g, " "));
		}

		var tt = getParameterByName("sortby",window.location.href);
		if (tt != ''){
			$('#sortBy option[value='+tt+']').attr('selected', 'selected');
		}

	});

});