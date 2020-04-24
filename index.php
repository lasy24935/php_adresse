        <?php

        require_once('config.php');

        if(isset($_REQUEST['del']))
        {

          $uid=intval($_GET['del']);

          $sql = "delete from contact WHERE  id=:id";

          $query = $connect->prepare($sql);

          $query-> bindParam(':id',$uid, PDO::PARAM_STR);

          $query -> execute();

          echo "<script>alert('Membre supprimer avec success ');</script>";

          echo "<script>window.location.href='index.php'</script>"; 
        }

        ?>

<?php
           include_once 'header.php';

?>



<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Listes des Membres </h3> <hr />
<a href="insert.php" class="btn btn-large btn-success">
        <i class="glyphicon glyphicon-plus"></i> &nbsp; Ajouter un utilisateur
    </a>
<div class="table-responsive">                
<table id="mytable" class="table table-bordred table-striped">                 
<thead>
<th>#</th>
<th>Prenom</th>
<th>Nom </th>
<th>Email</th>
<th>Contact</th>
<th>Adresse</th>
<th>Posting Date</th>
<th>Edit</th>
<th>Delete</th>
</thead>
<tbody>
    
<?php 
$sql = "SELECT * from contact";
//Prepare the query:
$query = $connect->prepare($sql);
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
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($result->prenom);?></td>
    <td><?php echo htmlentities($result->nom);?></td>
    <td><?php echo htmlentities($result->email);?></td>
    <td><?php echo htmlentities($result->contact);?></td>
    <td><?php echo htmlentities($result->adresse);?></td>
    <td><?php echo htmlentities($result->posting);?></td>

    <td><a href="update.php?id=<?php echo htmlentities($result->id);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

    <td><a href="index.php?del=<?php echo htmlentities($result->id);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
    </tr>
    

<?php 
// for serial number increment
$cnt++;
}} ?>
</tbody>      
</table>
</div>
</div>
</div>
</div>

<?php
           include_once 'footer.php';

?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
     

  </body>
</html>