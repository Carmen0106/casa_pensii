<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    //query pentru a scoate numele dosarelor din baza de date
    $query = "SELECT * FROM dosare";
    $useri = $db->select($query);
?>

 <div class="container">
     
    <?php if ($_SESSION['tip'] == 2):?>
     <div class="col-md-12">
        <div class="panel panel-warning">
        <div class="panel-heading"><label for="rand"><h3 class="panel-title" >Adauga dosar</h3></label></div>
        <div class ="panel-body">
        <div class="row" id="rand">
                <div class="col-md-2"><strong>Numar dosar</strong></div>
                <div class="col-md-3"><strong>Nume</strong></div>
                <div class="col-md-3"><strong>Prenume</strong></div>
                <div class="col-md-4"><strong>CNP</strong></div>
        

                
        </div>
        <div class="row">
            <form  method="POST" action="admin/adauga_dosar.php">
            <div class="col-md-2"><input id="numar_d" type="text" name="numar" required/> </div>
            <div class="col-md-3"><input type="text" name="nume" required/> </div> 
            <div class="col-md-3"><input type="text" name="prenume" required/> </div> 
            <div class="col-md-2"><input type="text" name="cnp" required/> </div>
            <div class="col-md-2"><button type="submit" class="btn btn-warning  pull-right">Adauga</button></div>
            </form>
        <br><br>
        </div>
        </div>
        </div>
        </div>


 </div>
    <?php else : {header("Location: index.php");}?> 
    <?php endif;?>
    <?php include 'footer.php';?>
