jQuery(function () {
	jQuery('.widget').each(function() {
		if (jQuery(this).index()%3 == 1) {
			jQuery(this).css({
				"width": "23%",
				"marginLeft": "2%"
			});
		} else if (jQuery(this).index()%3 == 2) {
			jQuery(this).css({
				"width": "23%",
				"marginRight": "2%"
			});
		} else if (jQuery(this).index()%3 == 0) {
			jQuery(this).css({
				"width": "50%",
			});
		}
	})

})
