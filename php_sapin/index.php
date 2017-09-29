<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Sapin de Noêl</title>
</head>
<body>
    <form method="get" action="">
       <label for="nb">Entrez le nombre d'étage</label>
       <input type="text" name="nb"> 
        <br>
        <input type="submit" value="Envoyer">
    </form>
   
    <?php
    
    if(isset($_GET["nb"])){
        
    $nombre = $_GET["nb"];
    }
    
    function sapin(){
    
    $feuilles = "^";
    $tronc = "|";
    
    for($j=0;$j<4;$j++) { 
        for ($i=0; $i<4; $i++){
            
        echo '<p>' . $feuilles . '</p>';
        $feuilles .= "^"; 
            
        }
        $feuilles = substr($feuilles, 2 );
    }
    
    for($i = 0; $i < 4/2 ; $i++){
        if($i == 0){
            for($j = 0; $j < 4; $j++){
                $tronc .= "|";
            }  
        }
            echo "<p>" . $tronc . "</p>";
    }
    }
    
    sapin();
    
    ?>
</body>
</html>


<!--    for($i = 0; $i < 4; $i++){
        $tronc .= "|";
    }
    for($i = 0; $i < 4; $i++){
        echo "<p>" . $tronc . "</p>";
    }-->