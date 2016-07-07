<?php include 'header.php'; ?>
<?php
$db= new Database;

?>

  <body>

    <div class="container">
        <div>
            
        </div>
        
        <div id="nr_dosar" class="row">
            <label>Dosar Nr.</label> 
            <p>633357834</p>
        </div>
        <div class="row">
            
        </div>
        <div id="nume_dosar" class="row">
            <div class="col-md-2"></div>
            <label class="col-md-3">Nume:</label>
            <p class="col-md-4">Ionescu Maria</p>
        </div>
        <div id="modificari" class="row">
            <div class="col-md-2"></div>
            <label class="col-md-3">Registru modificari:</label>
            <p class="modificare col-md-4">Anexa 1. de Marinela Ionescu la 12.06.2016</p>
        </div>
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