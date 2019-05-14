<?php include("header.php"); ?>
<?php
if(isset($_POST["register"])){
if(!empty($_POST['login']) && !empty($_POST['nickname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
 $connect=mysqli_connect('localhost', 'root', '', 'reg');
 $login=mysqli_real_escape_string($connect,$_POST['login']);
 $nickname=mysqli_real_escape_string($connect,$_POST['nickname']);
 $email=mysqli_real_escape_string($connect,$_POST['email']);
 $password=md5($_POST['password']);
 $image=mysqli_real_escape_string($connect,$_POST['image']);
 $query=mysqli_query($connect,"SELECT * FROM igor WHERE email='$email'");   
 $numr=mysqli_num_rows($query);
 if($numr==0)
 {
 $sql_q="INSERT INTO igor
 (login,nickname,email,password, image)
 VALUES('$login','$nickname', '$email', '$password', '$image')";
 $res=mysqli_query($connect,$sql_q);
 if($res){
echo '<script type="text/javascript">
window.location = "enter.php"
</script>';
 }
 else {
 echo "Не удалось добавить информацию";
 }
 }
else {
  echo "Этот Email занят. Попробуйте другой!";
 }
}else {
  //$info = "Все поля обязательны для заполнения!";
  echo "Все поля обязательны для заполнения!";
}}


?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="reg.css">
    <title></title>
</head>

<body>
<div>
<div class="container">
<form action="reg.php" method="post" name="registerform">
     <h1>Зарегистрируйтесь</h1>
<br>
<input name="login" size="30" type="text" value="" placeholder="Логин">
<br>
 <input name="nickname" size="30" type="text" placeholder="Ваш никнейм">
<br>
<input name="email" size="30" type="email" placeholder="Ваш Email">
<br>
<input name="password" size="30" type="password" placeholder="Пароль">
    <br>
<p><label>Аватар:<br>
<input name="image" type="file"></label></p>
<p><input name="register" type="submit" value="Зарегестрироваться" class="btn btn-lg btn-primary"></p>
<p><a href="log.php">Уже зарегистрированы?</a></p>
 </form>
</div>
</div>
</body>
</html>
<?php include("footer.php");?>