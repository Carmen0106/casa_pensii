<?php include 'header.php'; ?>
<?php
$db= new Database();
$nr_dosar = (int)$_GET['dosar'];


//introduc modificare pe dosar

 if(isset($_POST['salveaza'])){
        $id_user = $_SESSION['id'];
        $nume_modif = $_POST['text_modif'];
        if($nume_modif == "" || $nume_modif == " "){
            $error= "Introduceti numele modificari facute!";
        }else{
            $add_modif = "INSERT INTO modificari (id_user, id_dosar, nume_modif) VALUES ($id_user, $nr_dosar,'$nume_modif')";
            $result= $db->insert($add_modif);  
        }

 }
 
 
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
    <div class="container">
        <div class="row col-md-12">
            <div class="panel panel-primary">
                    <?php if($dosar->num_rows != 0):?>
                        <?php while($row= $result->fetch_assoc()):?>
                <div class="panel-heading" id="nr_dosar" >
                    <h4><label>Dosar Nr.</label> <?php echo $row['numar'];?></h4>
                </div>
               
             
                <div class="panel-body">
                    <div id="nume_dosar" class="row">
                        <label class="col-md-6">Nume:</label>
                        <p class="col-md-6"><?php echo $row['nume']." ".$row['prenume'];?></p>
                    </div>
                    <hr>
                <div id="modificari" class="row">
                        <label class="col-md-6">Registru modificari:</label>
                            <?php while($row= $dosar->fetch_assoc()):?>
                        <p class="col-md-6"></p>  
                        <p class="modificare col-md-6 "><?php echo $row['nume_modif'];?> de <?php echo $row['username'];?> la <?php echo formatDate($row['data']);?></p>          
                            <?php endwhile;?>
                </div>  
               
                       <?php endwhile; ?>
                <?php else:?>
                    <?php while($row= $result->fetch_assoc()):?>
                    
                <div class="panel-heading" id="nr_dosar">
                   <h4><label>Dosar Nr.</label><?php echo $row['numar'];?></h4>
                </div>
              
                <div class="panel-body">
                <div id="nume_dosar" class="row">
                    <label class="col-md-6">Nume:</label>
                    <p class="col-md-6"><?php echo $row['nume']." ".$row['prenume'];?></p>
                </div>
                <hr>
                <div id="modificari" class="row">
                    <label class="col-md-6">Registru modificari:</label>
                    <p class="modificare col-md-6">Nu exista modificari pe dosar.</p>
                </div>
               
            <?php endwhile;?>
        <?php endif;?>
               
           <form method="POST" action="modifica_dosar.php?dosar=<?php echo $nr_dosar; ?>">
             <div id="ad_modif" class="row">
              <label class="col-md-6">Adauga modificare:</label>
              <textarea id="text_modif" name="text_modif" class="col-md-6"></textarea>

             </div>
             <?php if(isset($error)):?>
               <div class="col-md-6"></div>
              <div class="col-md-6" id="err">
                  <p><?php echo $error?></p>
              </div>
              <?php endif;?>
               <br>
               <hr>
            <div class="row">
            <div class="col-md-4"></div>
            <div id="inapoi-salveaza" class="col-md-4">
                <a id="inapoi" class="btn btn-primary" name="inapoi" href="index.php" >Inapoi</a>
                <input type="submit" class="btn btn-success" name="salveaza" value="Salveaza">
            </div>
            <div class="col-md-4"></div>
            </div>
           </form>
        </div><!-- panel-body -->
        </div><!-- panel-body -->
        </div><!-- panel-default -->
        </div>
</div><!-- /.container -->
   

<?php include 'footer.php'; ?>
