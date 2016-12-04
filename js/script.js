 $(document).ready(function () {
 	// Слайдер головна
    var mySwiper = new Swiper ('.home__slider', {
    	pagination: '.home-slider__pagination',
    	effect: 'fade',
    	autoplay: 5000
    });


	// Дата для подій 
    $('#datetimepicker1').datetimepicker({
    	format:'YYYY-MM-DD HH:mm:00'
    });
    // Дата для контакту 
    $('#datetimepicker-date').datetimepicker({
    	format:'YYYY-MM-DD'
    });
    

    // Логін
    $('.login__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize(); 
		$.ajax({ 
			type: 'POST', 
			url: '/functions/login.php', 
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

    // Реєстрація
    $('.register__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize(); 
		$.ajax({ 
			type: 'POST', 
			url: '/functions/save_user.php', 
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

    // Додавання події
    $('.new-event__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize(); 
		$.ajax({ 
			type: 'POST', 
			url: '/functions/event_add_model.php', 
			dataType: 'json',
			data: data,
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

    // Видалення події
    $('.event-item__delete').on('click',function(event){
    	event.preventDefault();
    	var item = this;
		$.ajax({ 
			type: 'POST', 
			url: '/functions/event_delete.php', 
			dataType: 'json',
			data: { itemId: $(item).data('id')},
			success: function(data){
				if(data['error']){
					alert(data['error']);
				} else{
					$(item).parents('.list-group-item').remove();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		    	alert(xhr.status);
		    	alert(thrownError);
			}          
		});
    });

    // Зміна події
    $('.event-edit__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize(); 
		$.ajax({ 
			type: 'POST', 
			url: '/functions/event_edit_model.php', 
			dataType: 'json',
			data: data,
			success: function(data){
				if(data['error']){
					alert(data['error']);
				} else{
					alert('Подію змінено');
					location = '/events.php';
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		    	alert(xhr.status);
		    	alert(thrownError);
			}          
		});
    });

    // Додавання контакту
    $('.contact-add__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize(); 
		$.ajax({ 
			type: 'POST', 
			url: '/functions/contact_add_model.php', 
			dataType: 'json',
			data: data,
			success: function(data){
				if(data['error']){
					alert(data['error']);
				} else{
					alert('Контакт додано');
					location = '/contacts.php';
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		    	alert(xhr.status);
		    	alert(thrownError);
			}          
		});
    });

    // Зміна контакту
    $('.contact-edit__form').on('submit',function(event){
    	event.preventDefault();
        var data = $(this).serialize();
        var contId = $(this).find('.contact-edit__id').val();
		$.ajax({ 
			type: 'POST', 
			url: '/functions/contact_edit_model.php', 
			dataType: 'json',
			data: data,
			success: function(data){
				if(data['error']){
					alert(data['error']);
				} else{
					alert('Контакт змінено');
					location = '/contact.php?id=' + contId;
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		    	alert(xhr.status);
		    	alert(thrownError);
			}          
		});
    });


    // Видалення контакту
    $('.contacts-item__delete').on('click',function(event){
    	event.preventDefault();
    	var item = this;
		$.ajax({ 
			type: 'POST', 
			url: '/functions/contact_delete.php', 
			dataType: 'json',
			data: { itemId: $(item).data('id')},
			success: function(data){
				if(data['error']){
					alert(data['error']);
				} else{
					$(item).parents('.list-group-item').remove();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		    	alert(xhr.status);
		    	alert(thrownError);
			}          
		});
    });
    

});