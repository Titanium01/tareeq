<?php
session_start();

// If user already logged in, redirect to home
if (!empty($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/index.css" rel="stylesheet">
<style>
body {
  background:#f3f5f7;
  display:flex;
  height:100vh;
  align-items:center;
  justify-content:center;
}
.login-box {
  background:#fff;
  padding:30px;
  border-radius:10px;
  box-shadow:0 4px 20px rgba(0,0,0,.08);
  width:350px;
}
</style>
</head>

<body>
<div class="login-box">
<h4 class="mb-3 text-center">تجسيل الدخول</h4>

<!-- login form -->
<form id="loginForm">
  <div class="mb-3 t-r">
    <label class="form-label">اسم المستخدم</label>
    <input type="text" class="form-control" name="username" required>
  </div>

  <div class="mb-3 t-r">
    <label class="form-label">كلمة المرور</label>
    <input type="password" class="form-control" name="password" required>
  </div>

  <button class="btn btn-primary w-100">تسجيل الدخول</button>
</form>

<div id="loginMsg" class="mt-2 text-center text-danger"></div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#loginForm').on('submit', function(e){
  e.preventDefault();
  $('#loginMsg').text('');

  $.post('back-end/login.php', $(this).serialize(), function(res){
    if (res.success) {
      location.href = '/';
    } else {
      console.log('Login error:', res);
      $('#loginMsg').text(res.error);
    }
  }, 'json');
});
</script>
</body>
</html>
