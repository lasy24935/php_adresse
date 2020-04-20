<?php
// include database connection file
require_once'config.php';
if(isset($_POST['insert']))
{

// Posted Values  
$fname=$_POST['prenom'];
$lname=$_POST['nom'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$adresse=$_POST['adresse'];

// Query for Insertion
$sql="INSERT INTO blogs(prenom,nom,email,contact,adresse) VALUES(:fn,:ln,:eml,:cno,:adrss)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ln',$lname,PDO::PARAM_STR);
$query->bindParam(':eml',$email,PDO::PARAM_STR);
$query->bindParam(':cno',$contact,PDO::PARAM_STR);
$query->bindParam(':adrss',$adresse,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='index.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>"; 
}
}
?>


<?php
           include_once 'header.php';

?>


<div class="container">

<div class="row">
<div class="col-md-12">
<h3>Ajouter un Adresse </h3>
<hr />
</div>
</div>


<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>Prenom </b>
<input type="text" name="prenom" class="form-control" required>
</div>
<div class="col-md-4"><b>Nom </b>
<input type="text" name="nom" class="form-control" required>
</div>
</div>

<div class="row">
<div class="col-md-4"><b>Email </b>
<input type="email" name="email" class="form-control" required>
</div>
<div class="col-md-4"><b>Contact</b>
<input type="text" name="contact" class="form-control" maxlength="10" required>
</div>
</div>  



<div class="row">
<div class="col-md-8"><b>Adresse</b>
<textarea class="form-control" name="adresse" required></textarea>
</div>
</div>  

<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="insert" value="Submit">
</div>
</div> 
     
         

</form>
              
</div>
</div>


<?php
           include_once 'footer.php';

?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>