$(function(){
	// Ajax Detail product
		$('.detail').click(function(e){
			e.preventDefault();
			var id=$(this).attr("data-id");
			$.ajax({
				url:url_base+"/"+id,
				type:'GET',
				success: function(res){

					$('#name').text(res.name);
					$('#price').text(res.price);
					$('#quantity').text(res.quantity);
					$('#date_public').text(res.created_at);
					$('#date_update').text(res.updated_at);
				},
				error: function(error){

				}
			});
		});
	// ../----------------------------------------------------

	// Ajax Delete
		$('.delete').click( function(e){
			e.preventDefault();
			var $this=$(this);
			var id=$(this).attr("data-id");
			console.log(id);
			$.ajax({
					url:url_base+"/"+id,
					type:'DELETE',
					data:{
						id:id
					},
					success: function(res){
						$this.parents('tr').remove();
					},
					error: function(error){

					}
				})
		});
	// ../---------------------------------------------------------------------

	
	// Ajax Edit
		$('.edit').click( function(e){
		e.preventDefault();
		var $this=$(this);
		var id=$(this).attr("data-id");
		$.ajax({
				type:'GET',
				success: function(res){
					$("#name_edit").val(res.name);
					$("#price_edit").val(res.price);
					$("#quantity_edit").val(res.quantity);
					$('#form_edit').submit( function(x){
						x.preventDefault();
						$.ajax({
								url:url_base+"/"+id,
								type:'PUT',
								data : $("#form_edit").serialize(),
						}).done(function(c){
								console.log(c);
						}).fail(function(data) {
						      
				    });

				},
				error: function(error){

				}
			});
	});

	// ../---------------------------------------------------------------------

	// Ajax add
	$('.add').click( function(x){
		x.preventDefault();
		$.ajax({
				url:url_base+"/store",
				type:'POST',
				dataType: 'Json',
				data : $("#form_add").serialize(),
				success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
                    console.log(result);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
		});
		      
    });

	// ../---------------------------------------------------------------------

});