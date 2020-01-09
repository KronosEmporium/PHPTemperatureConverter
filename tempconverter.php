<?php
// tempconverter.php
if (isset($_POST["Temperature"])) {
    
    $InputTemp = $_POST["Temperature"];
    $InputUnit = $_POST["FromTempUnit"];
    
    // Shows data
    if ($InputUnit === "Fahrenheit") {
        $ftemp = $InputTemp;
        $ctemp = convertToC($InputTemp);
        $ktemp = convertToC($InputTemp) + 273.15;
        $rtemp = $InputTemp + 459.67;
    } else if ($InputUnit === "Celsius") {
        $ftemp = convertToF($InputTemp);
        $ctemp = $InputTemp;
        $ktemp = $InputTemp + 273.15;
        $rtemp = convertToF($InputTemp) + 459.67;
    } else if ($InputUnit === "Kelvin") {
        $ftemp = convertToF($InputTemp - 273.15);
        $ctemp = $InputTemp - 273.15;
        $ktemp = $InputTemp;
        $rtemp = convertToF($InputTemp - 273.15) + 459.67;
    } else if ($InputUnit === "Rankine") {
        $ftemp = $InputTemp - 459.67;
        $ctemp = convertToC($InputTemp - 459.67);
        $ktemp = convertToC($InputTemp - 459.67) + 273.15;
        $rtemp = $InputTemp;
    }
    
    echo '
<form action="" method="POST">
    <p>Temperature to Convert</p>
    <input type="number" name="Temperature" />
    
    <p>From:</p>
    <input type="radio" name="FromTempUnit" value="Fahrenheit" checked> Fahrenheit
    <input type="radio" name="FromTempUnit" value="Celsius"> Celsius
    <input type="radio" name="FromTempUnit" value="Kelvin"> Kelvin
    <input type="radio" name="FromTempUnit" value="Rankine"> Rankine
    <input type="submit" value="Convert"/>
    
    <p>Input: ' . $InputTemp . ' ' . '&deg;' . $InputUnit . '
    <p>Fahrenheit: ' . round($ftemp, 2) . '&deg;F</p>
    <p>Celsius: ' . round($ctemp, 2) . '&deg;C</p>
    <p>Kelvin: ' . round($ktemp, 2) . '&deg;K</p>
    <p>Rankine: ' . round($rtemp, 2) . '&deg;Ra</p>
</form>
    ';
    
} else {
    // Shows form
    echo '
<form action="" method="POST">
    <p>Temperature Converter</p>
    <p>Enter Temperature: <input type="number" name="Temperature" />
    </p>
    <input type="radio" name="FromTempUnit" value="Fahrenheit" checked> Fahrenheit
    <input type="radio" name="FromTempUnit" value="Celsius"> Celsius
    <input type="radio" name="FromTempUnit" value="Kelvin"> Kelvin
    <input type="radio" name="FromTempUnit" value="Rankine"> Rankine
    <p></p>
    <input type="submit" value="Convert"/>
    
    <p>Fahrenheit:</p>
    
    <p>Celsius:</p>
    
    <p>Kelvin:</p>
    
    <p>Rankine:</p>
    
</form>
    ';
}

function convertToF($t) {
    return ($t * 9 / 5) + 32;
}

function convertToC($t) {
    return ($t - 32) * 5 / 9;
}

?>

<em>Note: Values are rounded to the nearest hundredth decimal place after conversion.</em>
