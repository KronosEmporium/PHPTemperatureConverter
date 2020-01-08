<?php
// postback.php

if (isset($_POST["Temperature"])) {
    // Shows data

    if ($_POST["FromTempUnit"] === "Fahrenheit") {
        $ftemp =
        $ctemp = 
        $ktemp =
    } else if ($_POST["FromTempUnit"] === "Celsius") {
        $ftemp =
        $ctemp = 
        $ktemp =
    } else if ($_POST["FromTempUnit"] === "Kelvin") {
        $ftemp =
        $ctemp = 
        $ktemp =
    }
    
    echo '
<form action="" method="POST">
    <p>Temperature to Convert</p>
    <input type="number" name="Temperature" />
    
    <p>From:</p>
    <input type="radio" name="FromTempUnit" value="Fahrenheit" checked> Fahrenheit
    <input type="radio" name="FromTempUnit" value="Celsius"> Celsius
    <input type="radio" name="FromTempUnit" value="Kelvin"> Kelvin

    <input type="submit" />
    
    <p>Fahrenheit:</p>
    
    <p>Celsius:</p>
    
    <p>Kelvin:</p>
    
</form>
    ';
    
} else {
    // Shows form
    echo '
<form action="" method="POST">
    <p>Temperature to Convert</p>
    <input type="number" name="Temperature" />
    
    <p>From:</p>
    <input type="radio" name="FromTempUnit" value="Fahrenheit" checked> Fahrenheit
    <input type="radio" name="FromTempUnit" value="Celsius"> Celsius
    <input type="radio" name="FromTempUnit" value="Kelvin"> Kelvin

    <input type="submit" />
    
    <p>Fahrenheit:</p>
    
    <p>Celsius:</p>
    
    <p>Kelvin:</p>
    
</form>
    ';
}