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
                        <div class="col-md-5"><strong>Actiuni</strong></div>
                </div>


             <?php if($dosar): ?>
             <?php while($row = $dosar->fetch_assoc()):?>        
                        
                    <form class="form-inline" method="POST" action="iadosar.php?dosar=<?php echo $row['numar']?>"> 
                        <div class="row">
                            
                                <div class="col-md-3"><font size="4"><?php echo $row['numar']?></font></div>
                                <div class="col-md-3"><strong><?php echo $row['nume']?></strong></div>
                                <div id="actiuni" class="col-md-5">
                                    <?php if ($row['id_user']==0):?>
                                    <button type="submit" class="btn btn-primary" style="float: left;width: 100px;">Ia in lucru <span class="glyphicon glyphicon-check"></span></button>
                                        <?php else:
                                            $queryuser = "SELECT username FROM useri WHERE id = '{$row['id_user']}'"; 
                                            $userul = $db->select($queryuser);
                                            $rowuser = $userul->fetch_assoc();
                                        echo 'Dosar in lucru la utilizatorul <b>'.$rowuser['username'].'</b>.';

                                        endif;?>
                                  
                                    <a class="btn btn-default" style="float: right;" href="index.php">Inapoi<span class="glyphicon glyphicon-backward"></span></a>
                                        
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