import viewportChecker from './viewport-checker'

export default {
	
	init() {

		viewportChecker();

		var offset = 0;

		// Animate Content in
		$('.animate-block').viewportChecker({
			classToAdd: 'come-in',
			offset: offset,
		});

		$('.animate-sequence').viewportChecker({
			classToAdd: '',
			offset: offset,
			callbackFunction: function(){
				$('.animate-sequence .item').each(function(index) {
					var time = 200 * (index + 1);
					var $this = $(this);
					setTimeout(function() {
						$this.addClass('come-in');
					}, time);
				});
			},
		});

		setTimeout(function(){
			$('.animate-now').addClass('come-in');
		}, 500);

	},

}






