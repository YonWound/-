<?php include("header.php"); ?>





<?php
session_start();
if (isset($_SESSION['HTTP_USER_AGENT']))
{
    if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
    {
        // код
    }
}
else
{
    $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
}
require_once ('connect.php');
if (isset ($_POST['login']) and isset($_POST['password'])){
    $login=$_POST['login'];
    $password=md5($_POST['password']);
    $query="SELECT * FROM igor WHERE login='$login' and password='$password'";
    $result=mysqli_query($connection,$query) or die (mysqli_error($connection));
        if (mysqli_num_rows($result)){
            $_SESSION['login']=$login;
            $_SESSION['password']=md5($password);
            
          
        }else{
           echo "Неверный логин или пароль";
        }
    
    
}
if (isset($_SESSION['login']) and isset($_SESSION['password'])){
   $login= $_SESSION['login'];
    $password=$_SESSION['password'];
echo "hello"." ". $login." ";
    echo "Вы вошли"." ";
      echo "<a href='logout.php'>logout</a>";
}
     

?>



















    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
<link rel="stylesheet" href="log.css">
<title> </title>
<div>
<div>
<form action="log.php" method="post" name="loginf">
    <h1>Вход:</h1>
<br>
<input name="login" size="25" type="text" placeholder="Логин">
<br>
 <input name="password" size="25" type="password" placeholder="Пароль">
    <br>
    <p><button class="btn btn-lg btn-primary " type="submit">Вход</button></p>
 <p>Еще не зарегистрированы, то <br><a href= "reg.php">зарегистрируйтесь</a>!</p>
 </form>
 </div>
  </div>







   











</body>
</html>
<?php include("footer.php");?>