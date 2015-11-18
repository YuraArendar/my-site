/*
Name: 			UI Elements / Nestable - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.4.1
*/

(function( $ ) {

	'use strict';
		
	/*
	Update Output
	*/
	var updateOutput = function (e) {
		var list = e.length ? e : $(e.target),
			output = list.data('output');

		if (window.JSON) {
			var data =  window.JSON.stringify(list.nestable('serialize'));
			var token = $('meta[name="csrf_token"]').attr('content');

			var lang = $('meta[http-equiv="Content-Language"]').attr('content');

			$.ajax({
				url: '/'+lang+'/cms/structure/rebuild',
				method:"POST",
				data: {
					_token : token,
					data : data
				},
				success: function (res) {

				}

			});
		} else {
			output.val('JSON browser support required for this demo.');
		}
	};

	/*
	Nestable 1
	*/
	$('#nestable').nestable({
		group: 1
	}).on('change', updateOutput);

	/*
	Output Initial Serialised Data
	*/
	$(function() {
		updateOutput($('#nestable').data('output', $('#nestable-output')));
	});

}).apply(this, [ jQuery ]);