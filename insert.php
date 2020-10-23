<?php
require_once('config.php');
if(isset($_POST['insert']))
{

$fname=$_POST['prenom'];
$lname=$_POST['nom'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$adresse=$_POST['adresse'];

$sql="INSERT INTO membre(prenom,nom,email,contact,adresse) VALUES(:fn,:ln,:eml,:cno,:adrss)";
$query = $connect->prepare($sql);
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ln',$lname,PDO::PARAM_STR);
$query->bindParam(':eml',$email,PDO::PARAM_STR);
$query->bindParam(':cno',$contact,PDO::PARAM_STR);
$query->bindParam(':adrss',$adresse,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $connect->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Membre enregistrer avec succcess ');</script>";
echo "<script>window.location.href='contact.php'</script>"; 
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='contact.php'</script>"; 
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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