<?php include "header.php"; ?>
<?php 
$db = new Database();

//query care aduce toate dosarele primite din inbox
$query = "SELECT inbox.*,dosare.nume as nume_dosar, useri.nume, useri.prenume 
                    FROM inbox 
            INNER JOIN dosare ON dosare.numar = inbox.id_dosar
            INNER JOIN useri ON useri.id = inbox.id_sender
                    WHERE
            id_receiver =".$_SESSION['id'];
$result= $db->select($query);


//query pt  a lua in lucru dosarul primit(nu merge)
if(isset($_POST['ia_lucru'])){
    $id = $_SESSION['id'];
    $dosar=$_GET['dosar'];
   
    
    $query = "UPDATE dosare SET id_user ={$id} WHERE numar={$dosar}";
    $in_lucru = mysqli_query($db->link,$query);
    $query="DELETE FROM inbox WHERE id_dosar={$dosar}";
    $sterge= mysqli_query($db->link,$query);
    
    header("Location: index.php");
    exit();
}


?>


<div class="container">
        <div class="col-md-12">
        <div class="panel panel-primary">
        <div class="panel-heading"><label><h3 class="panel-title">Dosare primite</h3></label></div>
        <div class="panel-body">
        <div class="row" id="rand">
                <div class="col-md-2"><strong>Nr. dosar</strong></div>
                <div class="col-md-2"><strong>Nume dosar</strong></div>
                 <div class="col-md-2"><strong>De la:</strong></div>
                 <div class="col-md-3"><strong>Data:</strong></div>
                <div class="col-md-3"><strong>Actiuni</strong></div>
        </div>
            <hr>
        <div class="row">
                <?php if($result):?>
                <?php while($row = $result->fetch_assoc()):?>
            
<form method="POST" action="inbox.php?dosar=<?php echo $row['id_dosar'];?>">
                    
    <div class="col-md-2"><strong><?php echo $row['id_dosar'];?></strong></div>
                <div class="col-md-2"><?php echo $row['nume_dosar'];?></div>
                  <div class="col-md-2"><strong><?php echo $row['nume']." ".$row['prenume'];?></strong></div>
                  <div class="col-md-3"><?php echo formatDate($row['date_sent']);?></div>
                <div id="actiuni" class="col-md-3">
                    <button name="ia_lucru" type="submit" class="btn btn-primary ia_lucru">Ia in lucru <span class="glyphicon glyphicon-check"></span></button> 
                    <input type="hidden" name="dosar" value="<?php echo $row['id']; ?>" />
                </div>
                  <br><br>
               <?php endwhile;?>
               <?php else :?>
                   <p class="col-md-12">Nu ai dosare primite.</p>
               <?php endif;?>
        </div>
        </div>
        </div>
        </div>
</form>
</div>


<?php include "footer.php";?>