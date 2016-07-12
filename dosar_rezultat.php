<?php include 'header.php'; ?>
<?php 
    $db = new Database();

$query = "SELECT * FROM dosare WHERE numar LIKE '%{$_POST['dosar']}%'"; 
$dosar = $db->select($query);


?>  
 <div class="container">
     
    <div class="col-md-11">
        <div class="panel panel-primary">
            <div class="panel-heading"><label for="rand"><h3 class="panel-title" >Dosare</h3></label></div>
            <div class ="panel-body">
                <div class="row" id="rand">
                    
                        <div class="col-md-3"><strong>Nr. dosar</strong></div>
                        <div class="col-md-3"><strong>Nume dosar</strong></div>
                        <div class="col-md-3"><strong>Status</strong></div>
                        <div class="col-md-3"><strong>Actiuni</strong></div>
                </div>
                <hr>


             <?php if($dosar): ?>
             <?php while($row = $dosar->fetch_assoc()):?>        
                        
                    <form class="form-inline" method="POST" action="iadosar.php?dosar=<?php echo $row['numar']?>"> 
                        <div class="row">
                            
                                <div class="col-md-3"><?php echo $row['numar']?></div>
                                <div class="col-md-3"><strong><?php echo $row['nume']?></strong></div>
                                <div id="actiuni">
                                    
                                    <?php if ($row['id_user']== 0):?>
                                    
                                     <?php  $query = "SELECT * FROM inbox WHERE id_dosar =".$row['numar']; 
                                            $dosar_inbox = $db->select($query);
                                           
                                    ?>  
                                    <?php if($dosar_inbox):?>
                                    <?php  $rezultat= $dosar_inbox->fetch_assoc();?>
                                    <?php        
                                            $query_receive = "SELECT username FROM useri WHERE id =".$rezultat['id_receiver']; 
                                            $receiver = $db->select($query_receive);
                                            $data_receive = $receiver->fetch_assoc();
                                            
                                      ?>
                                    
                                        <p class ="col-md-3">Dosar expediat catre <strong><?php echo $data_receive['username'];?>.</strong></p>
                                    <?php else:?>
                                        <p class="col-md-3">Dosar liber.</p>
                                        <button type="submit" class="btn btn-primary ia_lucru">Ia in lucru <span class="glyphicon glyphicon-check"></span></button>
                                    <?php endif;?>
                                    
                                        <?php else:?>
                                            <?php 
                                                $queryuser = "SELECT username FROM useri WHERE id = '{$row['id_user']}'"; 
                                                $userul = $db->select($queryuser);
                                                $rowuser = $userul->fetch_assoc();
                                             ?>
                                    <p class ="col-md-3">Dosar in lucru la utilizatorul <strong><?php echo $rowuser['username'];?></strong></p>
                                    
                                        <?php endif;?>
                                  <a class="btn btn-default inapoi" href="index.php">Inapoi<span class="glyphicon glyphicon-backward"></span></a>
                                   
                                        
                                </div><br><br>
                        </div>
                    </form>
                               
            <?php endwhile;?>
            <?php else: echo 'Nu exista dosarul.'; ?>
            <?php endif;?>

            </div>
        </div>
    </div>  
</div>
         


<?php include 'footer.php';    