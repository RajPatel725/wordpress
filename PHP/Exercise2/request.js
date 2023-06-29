$(document).ready(function(){
		$("#click").click(function(){
			var no=$("#no").val();
			console.log("start");
			$.ajax({
				type: "GET",
				dataType: "json",
				url: "exer7ajax.php",
				data: {number: no}
				}).beforeSend(function(aa){
					console.log("Bebore");
				}).done(funcheck);
		});
	});
function funcheck(response){
		console.log('complete');
        $('#result').append(response.status);
}