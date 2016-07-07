<?php include 'header.php'; ?>
<?php
$db= new Database();
$nr_dosar = $_GET['dosar'];

//query modificari


 
$modif = "SELECT dosare.*, modificari.nume_modif, modificari.data, modificari.id, useri.username 
                FROM dosare INNER JOIN modificari ON dosare.numar= modificari.id_dosar
                INNER JOIN useri ON modificari.id_user = useri.id
                WHERE dosare.numar=".$nr_dosar;
 $dosar = mysqli_query($db->link,$modif);


 $query_date ="SELECT dosare.*, useri.username 
                FROM dosare
                    INNER JOIN useri ON dosare.id_user = useri.id
                WHERE dosare.numar=".$nr_dosar;
 $result = mysqli_query($db->link, $query_date);


?>

  <body>

    <div class="container">
        <?php if($dosar->num_rows != 0):?>
            <?php while($row = $dosar->fetch_assoc()):?>
                <div id="nr_dosar" class="row">
                    <label>Dosar Nr.</label> 
                    <p><?php echo $row['numar'];?></p>
                </div>
                <div id="nume_dosar" class="row">
                    <div class="col-md-2"></div>
                    <label class="col-md-3">Nume:</label>
                    <p class="col-md-4"><?php echo $row['nume'];?></p>
                </div>
            <div id="modificari" class="row">
                <div class="col-md-2"></div>
                <label class="col-md-3">Registru modificari:</label>
                <p class="modificare col-md-4"><?php echo $row['nume_modif'];?> de <?php echo $row['username'];?> la <?php echo formatDate($row['data']);?></p>
            </div>    
            <?php endwhile; ?>
        <?php else:?>
            <?php while($row = $result->fetch_assoc()):?>
                <div id="nr_dosar" class="row">
                    <label>Dosar Nr.</label> 
                    <p><?php echo $row['numar'];?></p>
                </div>
                <div id="nume_dosar" class="row">
                    <div class="col-md-2"></div>
                    <label class="col-md-3">Nume:</label>
                    <p class="col-md-4"><?php echo $row['nume'];?></p>
                </div>
            <div id="modificari" class="row">
                 <div class="col-md-2"></div>
              <label class="col-md-3">Registru modificari:</label>
                <p class="modificare col-md-4">Nu exista modificari pe dosar.</p>
            </div>
            <?php endwhile;?>
        <?php endif;?>
                
           
            
   
        
        <div id="ad_modif" class="row">
            <div class="col-md-2"></div>
            <label class="col-md-3">Adauga modificare:</label>
            <input  type="text" name="modif_text" class="col-md-4"><input type="submit" name="submit" value="OK">
        </div>
        <br>
        <div>
            <div class="col-md-2"></div>
            <a class="btn btn-default " name="inapoi" href="index.php" >Inapoi</a>
            <input type="submit" class="btn btn-default " name="salveaza" value="Salveaza">
        </div>
        


    </div><!-- /.container -->

<?php include 'footer.php'; ?>
