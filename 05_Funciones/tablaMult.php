<?php
    function tablaMult($numero){
        for($i = 1; $i <= 10; $i++) {
            echo "<p>$numero x $i = " . $numero*$i . "</p>";
        }
    }
?>