<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<script src="https://cdn.auth0.com/js/lock/10.0/lock.min.js"></script>

<div class="main">
  
    <!-- head结束 -->
    <!-- 登陆开始 -->
    <div class="dl_jm">
      
        <div id="authlock" style="width: 320px; margin: 40px auto; padding: 10px; border-style: dashed; border-width: 1px; box-sizing: border-box;">
		
		</div>
	</div>
	
	<script>
	   var lock = new Auth0Lock('sfyFhgeWtYy5x1W5fOwFg2FEqnHRHae3', 'mapleapp.auth0.com', {
		 container: 'authlock',
		 auth: {
		   redirectUrl: '',
		   responseType: 'code',
		   params: {
			 scope: 'openid email' // Learn about scopes: https://auth0.com/docs/scopes
		   }
		 }
	   });
	</script>


</div>
<!-- 返回头部开 -->

