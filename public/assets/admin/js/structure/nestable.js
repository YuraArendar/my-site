$(document).ready(function()
{
	var updateOutput = function(e)
	{
		var list   = e.length ? e : $(e.target),
				output = list.data('output');
		if (window.JSON) {
			var data =  window.JSON.stringify(list.nestable('serialize'));
			if(data.match(/\"id\"/)){
				var token = $('meta[name="csrf_token"]').attr('content');
				$.ajax({
					url: '/admin/structure/rebuild',
					method:"POST",
					data: {
						_token : token,
						data : data
					},
					success: function (res) {

					}
				});
			}
		} else {
			output.val('JSON browser support required for this demo.');
		}
	};

	$('#nestable').nestable({
				group: 1
			})
			.on('change', updateOutput);

});