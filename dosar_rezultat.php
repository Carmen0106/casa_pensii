<?php include 'header.php'; ?>
<?php 
    $db = new Database();

$cautadosar = isset($_POST['dosar'])?$_POST['dosar']:"";
$query = "SELECT * FROM dosare WHERE numar LIKE '%{$cautadosar}%' ORDER BY id_user"; 
$dosar = $db->select($query);


?>  
 <div class="container">
     
    <div class="col-md-11">
        <div class="panel panel-primary">
            <div class="panel-heading"><label for="rand"><h3 class="panel-title" >Dosare</h3></label></div>
            <div class ="panel-body">
                <div class="row text-uppercase" id="rand">
                    
                        <div class="col-md-3"><strong>Nr. dosar</strong></div>
                        <div class="col-md-3"><strong>Nume dosar</strong></div>
                        <div class="col-md-3"><strong>Status</strong></div>
                        <div class="col-md-3"><strong>Actiuni</strong>
                        <a class="btn btn-default inapoi pull-right" href="index.php">Inapoi<span class="glyphicon glyphicon-backward"></span></a>
                        </div>
                </div>
                


             <?php if($dosar): ?>
             <?php while($row = $dosar->fetch_assoc()):?>        
                        
                    <form class="form-inline" method="POST" action="iadosar.php?dosar=<?php echo $row['numar']?>"> 
                        
                                    
                                    <?php if ($row['id_user'] == 0):?>
                                    
                                     <?php  $query = "SELECT * FROM inbox WHERE id_dosar =".$row['numar']; 
                                            $dosar_inbox = $db->select($query);
                                           
                                     ?>  
                                                    <?php if($dosar_inbox):?>
                                                    <?php  $rezultat= $dosar_inbox->fetch_assoc();?>
                                                    <?php        
                                                            $query_receive = "SELECT username FROM useri WHERE id =".$rezultat['id_receiver']; 
                                                            $receiver = $db->select($query_receive);
                                                            $data_receive = $receiver->fetch_assoc();
                                                            
                                                            //ia datele din istoric si calculeaza diferenta de timp in zile
                                                            $query_istoric = "SELECT datediff(NOW(),inbox) as timp FROM istoric WHERE id_user =".$rezultat['id_receiver']." AND nr_dosar = {$row['numar']} AND inchide IS NULL"; 
                                                            $date_istoric = $db->select($query_istoric);
                                                            $datele = $date_istoric->fetch_assoc();
                                                    ?>

                        
                        <div class="row bg-grey bg-warning">
                            
                                <div class="col-md-3"><?php echo $row['numar']?></div>
                                <div class="col-md-3"><strong><?php echo $row['nume']." ".$row['prenume'];?></strong></div>
                                <div id="actiuni">
                        
                                    <div class ="col-md-3">Expediat catre <strong><?php echo $data_receive['username'];?></strong>
                                        <br><span class="label label-default">de <?php echo $datele['timp']." zile"; ?></span></div>
                                        
                                </div></div>
                                                    <?php else:?>
                        
                        <div class="row bg-grey bg-success">
                            
                                <div class="col-md-3"><?php echo $row['numar']?></div>
                                <div class="col-md-3"><strong><?php echo $row['nume']." ".$row['prenume'];?></strong></div>
                                <div id="actiuni">
                        
                                <div class="col-md-3">Liber.</div>
                                <button type="submit" class="btn btn-primary ia_lucru">Ia in lucru <span class="glyphicon glyphicon-check"></span></button>
                                                    
                                </div></div>
                                                            
                                                            <?php endif;?>
                                    
                                        <?php else:?>
                                            <?php 
                                                $queryuser = "SELECT username FROM useri WHERE id = '{$row['id_user']}'"; 
                                                $userul = $db->select($queryuser);
                                                $rowuser = $userul->fetch_assoc();
                                                //ia datele din istoric si calculeaza diferenta de timp in zile
                                                $query_istoric2 = "SELECT datediff(NOW(),lucru) as timp FROM istoric WHERE id_user =".$row['id_user']." AND nr_dosar = {$row['numar']} AND inchide IS NULL"; 
                                                $date_istoric2 = $db->select($query_istoric2);
                                                $datele2 = $date_istoric2->fetch_assoc();
                                             ?>
                        
                        <div class="row bg-grey bg-danger">
                            
                                <div class="col-md-3"><?php echo $row['numar']?></div>
                                <div class="col-md-3"><strong><?php echo $row['nume']." ".$row['prenume'];?></strong></div>
                                <div id="actiuni">
                        
                                <div class ="col-md-3">In lucru la utilizatorul <strong><?php echo $rowuser['username'];?></strong>
                                <br><span class="label label-default">de <?php echo $datele2['timp']." zile"; ?></span></div>
                                    
                                </div></div>
                                        
                                        <?php endif;?>
                                  
                                   
                                        
                        
                    </form>
                               
            <?php endwhile;?>
            <?php else: echo 'Nu exista dosarul.'; ?>
            <?php endif;?>

            </div>
        </div>
    </div>  
</div>
         


<?php include 'footer.php';    