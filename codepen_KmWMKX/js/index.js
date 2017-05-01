$(document).ready(function(){
		$(".form-body-signup").hide();
	$(".sign_up").on('click',function(){
	  $(".form-body-signup").show();
	  $(".login_body").hide();
	});
	$(".login").on('click',function(){
	  $(".login_body").show();
	  $(".form-body-signup").hide();
	});
	
	$("#check").on('click',function(){
		var username=document.getElementById("username_signup").value;
			var pwd=document.getElementById("password_signup").value;
			var phone=document.getElementById("phone").value;
			
			//var myData={"user_name":user_name,"pwd":pwd};
			if(username===''||pwd===''){
				alert("Please enter every field");
			}else{
				$.ajax({
				url:'new-user.php',
				type:'POST',
				data:{
					username:username,
					pwd:pwd,
					phone:phone
				},
				success:function(){
					alert("created");
				}
			});
				//	return false;

			}	
		
	});
	
		$("#username_signup").focusout(function(){
	 var re =  /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	 var username = $("#username_signup").val();
		if(!(re.test(username))){
			//alert("true");
			$("#name_err").html("Not a valid userid");
			document.getElementById("check").disabled=true;
			//document.getElementById("button").disabled=true;
		}else{
			document.getElementById("check").disabled=false;
			//document.getElementById("button").disabled=false;
		}
});

	$("#button").on('click',function(){
		//alert("hello");
		//var data=0;
		var user_name=document.getElementById("username_login").value;
		//alert(user_name);		
		var pwd=document.getElementById("password_login").value;

		$.ajax({
			url:'checkUser.php',
			type:'POST',
			data:{
				user_name:user_name,
				pwd:pwd
			},
			success:function(data){
				console.log(data);
				//data=data;
			}
		});
		
		//return false;
		
	})
	
	
	

})

