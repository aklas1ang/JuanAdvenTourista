<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="src/style.css">
</head>
<body>
     <form action="../create/create.php" method="post">
     	<h2>SIGN UP</h2>

        <label>Fullame</label>
        <input type="text" name="fullname" placeholder="Fullname">

        <label>Username</label>
               <input type="text"
                      name="username"
                      placeholder="Username">
        <p class="text-danger" id="messageUsername"></p>

     	<label>Password</label>
     	<input type="password"
                 name="password"
                 placeholder="Password">

          <label>Confirm Password</label>
          <input type="password"
                 name="re_password"
                 placeholder="Confirm Password">
          <div id="messagePass"></div>

     	<button disabled type="submit" name="user">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function getUsername(){
            let text = $(this).val();
            $.post('../db/fetch/adminFetch.php',{
                username : text
            },function(data){
                let result = false;
                let usernames = JSON.parse(data);
                usernames.forEach(function(username){
                    if(username === text){
                        result = true;
                    }
                });
                if(result){
                    $('#messageUsername').text('Username already exists!');
                    $('button[name="user"]').attr('disabled', 'disabled');
                }else{
                    $('#messageUsername').text('');
                    $('button[name="user"]').removeAttr('disabled');
                }

            });
        }

        function confirmPass(){
            let pass = $('input[name="password"]').val();
            let repass = $(this).val();

            if(pass === repass){
                $('#messagePass').html('<p class = "text-success">Password Matched!</p>');
                $('button[name="user"]').removeAttr('disabled');
            }else if(repass === ''){
                $('#messagePass').html('');
                $('button[name="user"]').attr('disabled', 'disabled');
            }else{
                $('#messagePass').html('<p class = "text-danger">Password Does not Matched</p>');
                $('button[name="user"]').attr('disabled', 'disabled');
            }
        }

        $(document).ready(function(){
             $('input[name="username"]').on('keyup', getUsername);
             $('input[name="re_password"]').on('keyup',confirmPass);
        });
    </script>
</body>
</html>
