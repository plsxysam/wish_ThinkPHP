function change_code (obj) {
	$("#code").attr("src", verifyURL+'/'+Math.random());
		return false;
}

//登录验证 1为空  2为错误
var validate={username:1,password:1,code:1}
$(function(){
	$("#login").submit(function(){
		if (validate.username==0 && validate.password==0 && validate.code==0) {
			return true;
		}
		//验证用户名
		$("input[name='username']").trigger("blur");
		//验证密码
		$("input[name='password']").trigger("blur");
		//验证验证码
		$("input[name='code']").trigger("blur");
			return false;

	})
})
// $function(){
// 	//验证用户名
// 	$("input[name='username']").blur(function(){
// 		var username = $("input[name='username']");
// 		if (username.val().trim()=='') {
// 			username.parent().find("span").remove().end().append("<span class='error'>用户名不能为空</span>");
// 			return ;
// 		};

// 	})
// }