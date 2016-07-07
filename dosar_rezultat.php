<?php include 'header.php'; ?>
<?php 
    $db = new Database();

$query = "SELECT * FROM dosare WHERE numar LIKE '%{$_POST['dosar']}%'"; 
$dosar = $db->select($query);
?>  
 <div class="container">
     
        <div class="col-md-12">
        <label for="rand"><h3>Dosare in lucru</h3></label>
        <div class="row" id="rand">
            <div class="col-md-1"><strong>Nr. ctr.</strong></div>
                <div class="col-md-3"><strong>Nr. dosar</strong></div>
                <div class="col-md-3"><strong>Nume dosar</strong></div>
                <div class="col-md-3"><strong>Actiuni</strong></div>
        </div>
    
        
         <?php if($dosar): ?>
         <?php while($row = $dosar->fetch_assoc()):?>        
        
        <form class="form-inline" method="POST" action="iadosar.php?dosar=<?php echo $row['numar']?>"> 
        <div class="row">
            <div class="col-md-1"><font size="4">1</font></div>
                <div class="col-md-3"><font size="4"><?php echo $row['numar']?></font></div>
                <div class="col-md-3"><strong><a href="modifica_dosar.php"><?php echo $row['nume']?></a></strong></div>
                <div id="actiuni" class="col-md-5">
                    <button type="submit" class="btn btn-primary">Ia in lucru <span class="glyphicon glyphicon-check"></span></button>
                    <a class="btn btn-default" href="index.php">Anuleaza <span class="glyphicon glyphicon-backward"></span></a>
                    
                </div>
        </div>
        </form>
        
        <?php endwhile;?>
        <?php else: echo 'Nu exista dosarul.'; ?>
        <?php endif;?>
        
           
        </div>
         
</div>

<?php include 'footer.php';    