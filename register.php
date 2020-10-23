<?php session_start(); ?>

<?php
require_once('config.php');
if(isset($_POST['connecter']))
{

$fname=$_POST['username'];
$login=$_POST['login'];
$password=$_POST['password'];

$sql="INSERT INTO users(username,login,password) VALUES(:fn,:ln,:eml)";
$query = $connect->prepare($sql);
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ln',$login,PDO::PARAM_STR);
$query->bindParam(':eml',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $connect->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Inscription terminer ');</script>";
echo "<script>window.location.href='login.php'</script>"; 
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='login.php'</script>"; 
}
}
?>

<?php
           include_once 'header.php';

?>

<!--Login-->
<div class="card-body login">

  <div class="container my-5">
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="card auth">
          <div class="card-body">
            <h4 class="card-title " style="font-weight: bold">INSCRIPTION </h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row">

      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <form action="register.php" method="post">

          <div class="form-group">
            <label for="username">Prenom</label>
            <input type="text" class="form-control" id="username" placeholder="Votre prenom" name="username">
          </div>

          <div class="form-group">
            <label for="login">Login</label>
            <input type="email" class="form-control" id="login" placeholder="Votre login" name="login">
          </div>
          <div class="form-group">
            <label for="password">Password </label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password">
          </div>


          <button type="submit" class="btn btn-success btn-connecter" name="connecter" id="connecter">S'inscrit
          </button>
        </form>

      </div>
    </div>
  </div>
  <!--/Login-->
</div>

<?php
           include_once 'footer.php';

?>