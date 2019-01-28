$(document).ready(function() {
	$(".products").submit(function() {
		var str = $(this).serialize(); 
		$.ajax({
			type: "POST",
			url: "/cart/add",
			data: str,
			success: function(html) {
				if(html) {
					alert('Product successfully add to cart');
					number = $('#products_number').html() - 0;
					number++;
					$('#products_number').html(number);
				}
				else {
					alert('This product is already in cart');
				}
			}
		});
		return false;
	});

	$(".products-delete").submit(function() {
		var str = $(this).serialize(); 
		$(this).remove();
		$.ajax({
			type: "POST",
			url: "/cart/delete",
			data: str,
			success: function(html) {
				number = $('#products_number').html() - 0;
				number--;
				$('#products_number').html(number);
			}						
		});
		return false;
	});

	$(":input").bind('keyup change click', function (e) {
		 if (! $(this).data("previousValue") || $(this).data("previousValue") != $(this).val())
		 {
	  		id = this.id;
				qt = this.value - 0;
				price = $("#"+id+"price").html() - 0;
				total = price * qt;
				$("#"+id+"qt").html(qt);
				$("#"+id+"total").html(total);

				if ($(this).data("previousValue") < $(this).val()) {
					$("#"+id+"action").val("increase");
    		}

				if ($(this).data("previousValue") > $(this).val()) {
					$("#"+id+"action").val("decrease");
    		}
 
				action = $("#"+id+"action").val();

		    $.ajax({
					type: "POST",
		      url: "/cart/edit",
					data: {
						id: id,
						qt: qt,
						action: action
					},
		      cashe: false,
		    });

		   $(this).data("previousValue", $(this).val());
		 }
	});


	$(":input").each(function () {
		  $(this).data("previousValue", $(this).val());
	});

    $("form.password-recovery").hide();
    $("form.change-password").hide();
    $("form.change-data").hide();                
    
    $("a#change-data").on("click", function() {
        $("form.change-data").toggle();
        $("form.password-recovery").hide();
		$("form.change-password").hide();
    });

    $("a#change-password").on("click", function() {
        $("form.change-password").toggle();
        $("form.password-recovery").hide();
        $("form.change-data").hide();
    });

    $("a#password-recovery").on("click", function() {
        $("form.password-recovery").toggle();
        $("form.change-data").hide()
    });

    $("form.change-data").submit(function() {
        var str = $(this).serialize();
          $.ajax({
              type: "POST",
              url: "/user/edit_data",
              data: str,
              success: function(html) {
                  alert(html);
                  if(html == "Data successfully changed!") {
                      location.reload();
                  }
            }
      });
        return false;
    });

    $("form.change-password").submit(function() {
        var str = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "/user/edit_password",
            data: str,
            success: function(html) {
                alert(html);
            }
        });
        return false;
    });

	$("form.password-recovery").submit(function() {
        var str = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "/user/password_recovery",
            data: str,
            success: function(html) {
                alert(html);
            }
        });
        return false;
    });

	$("form.checkout").submit(function() {
		var str = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "/order/create",
			data: str,
			success: function(html) {
				//alert('yes');
				alert(html);
			}
		});
		return false;
	});

});
