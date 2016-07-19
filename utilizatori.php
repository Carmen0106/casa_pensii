<?php include 'header.php'; ?>
<?php 
    $db = new Database();
    //query pentru a scoate numele dosarelor din baza de date
    $query = "SELECT * FROM useri WHERE tip = 1";
    $useri = $db->select($query);
?>

 <div class="container">
     
    <?php if ($_SESSION['tip'] == 2):?>
     <div class="col-md-12">
        <div class="panel panel-warning">
        <div class="panel-heading"><label for="rand"><h3 class="panel-title" >Adauga utilizator</h3></label></div>
        <div class ="panel-body">
        <div class="row" id="rand">
                <div class="col-md-2"><strong>Username</strong></div>
                <div class="col-md-2"><strong>Nume</strong></div>
                <div class="col-md-2"><strong>Prenume</strong></div>
                <div class="col-md-2"><strong>Parola</strong></div>
                <div class="col-md-2"><strong>Administrator</strong></div>
                <div class="col-md-1"></div>
                
        </div>
        <div class="row">
            <form method="POST" action="admin/adauga-utilizator.php">
            <div class="col-md-2"><input type="text" name="username" required/></div>
            <div class="col-md-2"><input type="text" name="nume" required/></div> 
            <div class="col-md-2"><input type="text" name="prenume" required/></div>
            <div class="col-md-2"><input type="text" name="parola" required/></div>
            <div class="col-md-1 text-center"><input type="checkbox" name="tip" /></div>
            <div class="col-md-2"><button type="submit" class="btn btn-warning">Adauga</button></div>
            </form>
        <br><br>
        </div>
        </div>
        </div>
       </div>
     
     
     
     
     
     
        <div class="col-md-12">
        <div class="panel panel-primary">
        <div class="panel-heading"><label for="rand"><h3 class="panel-title" >Utilizatori</h3></label></div>
        <div class ="panel-body">
        <div class="row" id="rand">
                <div class="col-md-2"><strong>Username</strong></div>
                <div class="col-md-3"><strong>Nume</strong></div>
                <div class="col-md-3"><strong>Prenume</strong></div>
                <div class="col-md-3"><strong>Actiuni</strong></div>
        </div>
        <div class="row">
             <?php if($useri): ?>
              <?php while($row = $useri->fetch_assoc()):?>
                   
                    <div class="col-md-2"><font size="4"><strong> <?php echo $row['username']; ?></strong></font></div>
                    <div class="col-md-3"><font size="4"><?php echo $row['nume']; ?></font></div> 
                    <div class="col-md-3"><font size="4"><?php echo $row['prenume']; ?></font></div>
                    <div class="col-md-3"><font size="4">
                        <form method="POST">
                            <?php if($row['activ'] == 1): ?>
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Esti sigur ca vrei sa dezactivezi utilizatorul?')" formaction="admin/sterge_utilizator.php?user=<?php echo $row['id'];?>">
                                <span class="glyphicon glyphicon-remove"> </span> Dezactiveaza</button>
                            <?php else:?>
                            <button class="btn btn-success" type="submit" onclick="return confirm('Esti sigur ca vrei sa activezi utilizatorul?')" formaction="admin/sterge_utilizator.php?user=<?php echo $row['id'];?>">
                                <span class="glyphicon glyphicon-check"> </span> Activeaza</button>
                            <?php endif;?>
                            <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-adjust"> </span> Modifica</button>
                        </form>
                    </div>
        <br><br>
                    <?php endwhile; ?>
                 <?php else :?>
                        <p class="col-md-12">Nu exista useri.</p>
               <?php endif;?>
        </div>
        </div>
        <br>
              
        </div>
        </div>
        </div>
    <?php else : {header("Location: index.php");}?> 
    <?php endif;?>
    <?php include 'footer.php';?>
