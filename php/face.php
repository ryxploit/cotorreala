<html>
  <head>
     <title>sdk de facebook</title>

  </head>
  <body>
  <script>

      // This is called with the results from from FB.getLoginStatus().
      function statusChangeCallback(response) {
          console.log('statusChangeCallback');
          console.log(response);
          // The response object is returned with a status field that lets the
          // app know the current login status of the person.
          // Full docs on the response object can be found in the documentation
          // for FB.getLoginStatus().
          if (response.status === 'connected') {
              // Logged into your app and Facebook.
             // location.href='../index.php'
              testAPI();
          } else {
              // The person is not logged into your app or we are unable to tell.
              document.getElementById('status').innerHTML = 'Please log ' +
                  'into this app.';
          }
      }

      // This function is called when someone finishes with the Login
      // Button.  See the onlogin handler attached to it in the sample
      // code below.
      function checkLoginState() {
          FB.getLoginStatus(function(response) {
              statusChangeCallback(response);
          });
      }

      window.fbAsyncInit = function() {
          FB.init({
              appId      : '293513957727263',
              xfbml      : true,
              version    : 'v2.9'
          });
          FB.AppEvents.logPageView();

          FB.getLoginStatus(function(response) {
              statusChangeCallback(response);
          });
      };

      (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

      function testAPI() {
          console.log('Welcome!  Fetching your information.... ');
          FB.api('/me?fields=id,name,email,permissions', function(response) {
              console.log('Successful login for: ' + response.name);
              document.getElementById('status').innerHTML =
                  'Thanks for logging in, ' + response.name + '!' + '   ' + response.email +'.' + '  ' + response.id ;
          });

          FB.api('/me?fields=id,name,email,permissions', function(response) {
              console.log('Successful login for: ' + response.name);
              document.f1.nombre.value = response.name + '!';
             // location.href='../index.php'
          });

      }
  </script>

  <div
          class="fb-like"
          data-share="true"
          data-width="450"
          data-show-faces="true">
  </div>


  <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="true"
       data-auto-logout-link="true" data-use-continue-as="true" scope="public_profile,email" onlogin="checkLoginState();"></div>

  <div id="status">
  </div>

  <form action="" method="post" name="f1" id="f1">
    <label for="" >nombre</label>
    <input type="text" id="nombre" name="nombre" value="">
      <input type="submit">

  </form>

  </body>
</html>
