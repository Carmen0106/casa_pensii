<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    //query pentru a scoate numele dosarelor din baza de date
    $query = "SELECT * FROM dosare WHERE id_user =".$_SESSION['id'];
    $dosare = $db->select($query);
?>

 <div class="container">
     
    
        <div class="col-md-12">
        <div class="panel panel-primary">
        <div class="panel-heading"><label for="rand"><h3 class="panel-title" >Dosare in lucru</h3></label></div>
        <div class ="panel-body">
        <div class="row" id="rand">
                <div class="col-md-2"><strong>Nr. dosar</strong></div>
                <div class="col-md-6"><strong>Nume dosar</strong></div>
                <div class="col-md-4"><strong>Actiuni</strong></div>
        </div>
        <hr>
        <div class="row">
             <?php if($dosare): ?>
              <?php while($row = $dosare->fetch_assoc()):?>
                   
            <div class="col-md-2"><strong><?php echo $row['numar']; ?></strong></div>
                    <div class="col-md-6"><strong><a href="modifica_dosar.php?dosar=<?php echo $row['numar']; ?>"> <?php echo $row['nume']; ?></a></strong></div> 
                
                <div id="actiuni" class="col-md-4">
                    <form method="POST" action="schimba_utilizator.php">
                        <button type="submit"  value="<?php echo $row['numar']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Esti sigur ca vrei sa inchizi dosarul?')" formaction="inchide_dosar.php" >Inchide <span class="glyphicon glyphicon-remove-sign"></span></button>
                        <input type="search" class="form-control input-sm nume" name="nume" placeholder="Schimba utilizator"/>
                        <input type="hidden" name="dosar" value="<?php echo $row['numar']; ?>" />
                        <button type="submit" name="schimba" class="btn btn-default btn-sm" formaction="schimba_utilizator.php"><span class="glyphicon glyphicon-send"></span></button>
                    </form>
                </div><br><br>
                    <?php endwhile; ?>
                 <?php else :?>
                        <p class="col-md-12">Nu ai dosare.</p>
               <?php endif;?>
        </div>
        <br>
           
        </div>
        </div>
        </div>
    
     
     
</div>

<?php include 'footer.php';?>
