 $(document).ready(function () {
    var mySwiper = new Swiper ('.home__slider', {
    	pagination: '.home-slider__pagination',
    	effect: 'fade',
    	autoplay: 5000
    });

    $('#datetimepicker1').datetimepicker({
    	format:'YYYY-MM-DD hh:mm:00'
    });


    $('.login__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize(); 
		$.ajax({ 
			type: 'POST', 
			url: '/login.php', 
			dataType: 'json',
			data: data,
			success: function(data){
				if(data['error']){
					alert(data['error']);
				} else{
					location = '/account.php';
				}

		    	
			},
			error: function (xhr, ajaxOptions, thrownError) {
		    	alert(xhr.status);
		    	alert(thrownError);
			}          
		});
    });

    $('.register__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize(); 
		$.ajax({ 
			type: 'POST', 
			url: '/save_user.php', 
			dataType: 'json',
			data: data,
			success: function(data){
				if(data['error']){
					alert(data['error']);
				} else{
					alert('Дякуємо за реєстрацію. Введіть дані, для входу на сайт');
					location = '/';
				}

		    	
			},
			error: function (xhr, ajaxOptions, thrownError) {
		    	alert(xhr.status);
		    	alert(thrownError);
			}          
		});
    });

    $('.new-event__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize(); 
		$.ajax({ 
			type: 'POST', 
			url: '/event_add_model.php', 
			dataType: 'json',
			data: data,
			beforeSend: function(){
				alert(this.data);
			},
			success: function(data){
				if(data['error']){
					alert(data['error']);
				} else{
					alert('Подію додано');
					location = '/events.php';
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		    	alert(xhr.status);
		    	alert(thrownError);
			}          
		});
    });

});