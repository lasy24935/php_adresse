<?php session_start(); ?>


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
            <h4 class="card-title ">AUTHENTIFICATION </h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row">

      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <form action="login.php" method="post">

          <div class="form-group">
            <label for="login">Login</label>
            <input type="email" class="form-control" id="login" placeholder="Votre email" name="login" required>
          </div>
          <div class="form-group">
            <label for="password">Password </label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
          </div>

          <button type="submit" class="btn btn-success btn-connecter" name="connecter" id="connecter">Connecter
          </button>
          <a href="register.php" class="btn btn-large btn-primary" style="float: right;"><i
              class="glyphicon glyphicon-backward"></i> &nbsp; Inscrire</a>
        </form>

      </div>
    </div>
  </div>
  <!--/Login-->
</div>


<?php
           include_once 'footer.php';

?>