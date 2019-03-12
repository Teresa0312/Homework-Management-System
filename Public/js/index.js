$(document).ready(function(){
	
	if (navigator.userAgent.toLowerCase().indexOf('chrome') >= 0) {
		$(window).load(function () {
			$('input').each(function () {
				var outHtml = this.outerHTML;
				$(this).append(outHtml);
			});
		});
	}
	//去除谷歌表单自动填充
});