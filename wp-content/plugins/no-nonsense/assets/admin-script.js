jQuery(function() {

	// Settings toggles
	jQuery('.r34nono-options-toggle').each(function() {
		var fn = jQuery(this).data('fn');
		if (jQuery('input[name="' + fn + '"][value="1"]').prop('checked')) {
			jQuery(this).show();
		}
		else {
			jQuery(this).hide();
		}
	});
	jQuery('form.r34nono-admin input[type=radio]').on('change', function() {
		var this_wrapper = jQuery(this).closest('tr');
		var this_options = this_wrapper.find('.r34nono-options-toggle');
		if (this_options.length > 0) {
			if (jQuery(this).val() == 1) {
				this_options.slideDown();
			}
			else {
				this_options.slideUp();
			}
		}
	});
	
	// Submit activate
	jQuery('form.r34nono-admin input[type=radio], form.r34nono-admin input[type=checkbox]').on('change', function() {
		var frm = jQuery(this).closest('form.r34nono-admin');
		if (frm.find('input:checked').length > 0) {
			frm.find('input[type=submit]').removeClass('button-disabled');
		}
		else {
			frm.find('input[type=submit]').addClass('button-disabled');
		}
	});
	
	// Prevent inactive submission
	jQuery('form.r34nono-admin input[type=submit]').on('click', function() {
		if (jQuery(this).hasClass('button-disabled')) {
			return false;
		}
	});

});