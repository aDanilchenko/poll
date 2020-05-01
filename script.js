	let form = $("#form-poll");
	
	 form.on("submit", function(e){
		e.preventDefault();	
		
		let name = $("#name").val();
		let email = $("#email").val();	
		let answer_1 = $(".question-1:checked").val();
		let answer_2 = $(".question-2:checked").val();
		let answer_3 = $(".question-3:checked").val();	
		
		if(!answer_1 || !answer_2 || !answer_3 || !name || !email){
			$(".poll-result").text('Заполните все поля');
			return false;
		}
		$('.poll-result').text('Опрос отправлен.');
		
		$.ajax("get.php",{
			type: 'POST',
			cashe: false,
			data: {'answer_1': answer_1, 'answer_2': answer_2, 'answer_3': answer_3, 'name': name, 'email' : email},
			dataType: 'html',
			beforeSend: function(){
				$("#sendPoll").prop("disabled", true);
			},
			success: function(data){
				if(!data){
					alert('Ошибка');
				}
				$("#sendPoll").prop("disabled", false);
			}	
		});
	 })	