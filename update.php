<?php
// include database connection file
require_once 'config.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values  
$fname=$_POST['prenom'];
$lname=$_POST['nom'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$adresse=$_POST['adresse'];

// Query for Query for Updation
$sql="UPDATE membre SET prenom=:fn,nom=:ln,email=:eml,contact=:cno,adresse=:adrss WHERE id=:uid";
//Prepare Query for Execution
$query = $connect->prepare($sql);
// Bind the parameters
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ln',$lname,PDO::PARAM_STR);
$query->bindParam(':eml',$email,PDO::PARAM_STR);
$query->bindParam(':cno',$contact,PDO::PARAM_STR);
$query->bindParam(':adrss',$adresse,PDO::PARAM_STR);
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('  Membre mise à jour avec success');</script>";
// Code for redirection
echo "<script>window.location.href='contact.php'</script>"; 
}
?>


<?php
           include_once 'header.php';

?>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h3>Mettre à jour un Adresse </h3>
            <hr />
        </div>
    </div>

    <?php 
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT prenom,nom,email,contact,adresse,posting,id from membre where id=:uid";
//Prepare the query:
$query = $connect->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{               
?>
    <form name="insertrecord" method="post">
        <div class="row">
            <div class="col-md-4"><b>Prenom </b>
                <input type="text" name="prenom" value="<?php echo htmlentities($result->prenom);?>"
                    class="form-control" required>
            </div>
            <div class="col-md-4"><b>Nom </b>
                <input type="text" name="nom" value="<?php echo htmlentities($result->nom);?>" class="form-control"
                    required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"><b>Email</b>
                <input type="email" name="email" value="<?php echo htmlentities($result->email);?>" class="form-control"
                    required>
            </div>
            <div class="col-md-4"><b>Contact</b>
                <input type="text" name="contact" value="<?php echo htmlentities($result->contact);?>"
                    class="form-control" maxlength="10" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8"><b>Adresse</b>
                <textarea class="form-control" name="adresse"
                    required><?php echo htmlentities($result->adresse);?></textarea>
            </div>
        </div>
        <?php }} ?>

        <div class="row" style="margin-top:1%">
            <div class="col-md-8">
                <input type="submit" name="update" value="Update">
            </div>
        </div>
    </form>


</div>
</div>


<?php
           include_once 'footer.php';

?>