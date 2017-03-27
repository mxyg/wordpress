jQuery(function () {
	modelOrder();
	jQuery(window).resize(function () {
		modelOrder();
	})
})
function modelOrder() {
	if (jQuery(window).width() < 711) {
		jQuery('.widget').each(function() {
			jQuery(this).css({
				"width":"100%",
				"marginLeft": "0",
				"marginRight": "0"
			})
			.find('.date').show();
		})
	}else if (jQuery(window).width() < 911) {
		jQuery('.widget').each(function() {
			jQuery(this).css({
					"width":"49%",
					"marginRight": "2%",
					"marginLeft": "0",

				})
				.find('.date').show();
			if (jQuery(this).index()%2 === 0) {
				jQuery(this).css({
					"marginRight": "0",

				});
			}
		})
	} else {
		jQuery('.widget').each(function() {
			jQuery(this).find('.date').hide();
			if (jQuery(this).index()%3 == 1) {
				jQuery(this).css({
					"width": "23%",
					"marginLeft": "2%",
					"marginRight": "0",
				}).find('.title').css("maxWidth","100%");
			} else if (jQuery(this).index()%3 == 2) {
				jQuery(this).css({
					"width": "23%",
					"marginRight": "2%",
					"marginLeft": "0",
				}).find('.title').css("maxWidth","100%");
			} else if (jQuery(this).index()%3 == 0) {
				jQuery(this).css({
					"width": "50%",
					"marginRight": "0",
					"marginLeft": "0",
				}).find('.date').show();
			}
		})
	}
}
