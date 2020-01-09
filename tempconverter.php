<html>
<head>
<style>
    .unitInfo {
        position: absolute;
        border: 1px solid black;
        background: white;
    }

    #fInfo, #cInfo, #kInfo, #rInfo {
        display: none;
        width: 500px;
        height: 500px;
    }

    iframe {
        width: 100%;
        height: 100%;
    }

    #fInfo:hover, #f:hover + #fInfo {
        display: block;
    }

    #cInfo:hover, #c:hover + #cInfo {
        display: block;
    }

    #kInfo:hover, #k:hover + #kInfo {
        display: block;
    }

    #rInfo:hover, #r:hover + #rInfo {
        display: block;
    }
</style>
</head>
<body>
<?php

// tempconverter.php

if (isset($_POST["Temperature"])) {

    $InputTemp = $_POST["Temperature"];
    $InputUnit = $_POST["FromTempUnit"];
    
    // Do conversions
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
}

    // Show form
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
</form>
';

function convertToF($t) {
    return ($t * 9 / 5) + 32;
}

function convertToC($t) {
    return ($t - 32) * 5 / 9;
}

?>

<br>
<br>


<p>Input: <?php if (isset($InputTemp) && isset($InputUnit)) echo $InputTemp . '&deg; ' . $InputUnit; ?></p>


<a id="f">Fahrenheit: <?php if (isset($ftemp)) echo round($ftemp, 2); ?>&deg;F</a>
<div class="unitInfo" id="fInfo"><iframe src="https://en.wikipedia.org/w/index.php?title=Fahrenheit&printable=yes"></iframe>
</div>

<br>
<br>

<a id="c">Celsius: <?php if (isset($ctemp)) echo round($ctemp, 2); ?>&deg;C</a>
<div class="unitInfo" id="cInfo"><iframe src="https://en.wikipedia.org/w/index.php?title=Celsius&printable=yes"></iframe>
</div>

<br>
<br>

<a id="k">Kelvin: <?php if (isset($ktemp)) echo round($ktemp, 2); ?>&deg;K</a>
<div class="unitInfo" id="kInfo"><iframe src="https://en.wikipedia.org/w/index.php?title=Kelvin&printable=yes"></iframe>
</div>

<br>
<br>

<a id="r">Rankine: <?php if (isset($rtemp)) echo round($rtemp, 2); ?>&deg;Ra</a>
<div class="unitInfo" id="rInfo"><iframe src="https://en.wikipedia.org/w/index.php?title=Rankine_scale&printable=yes"></iframe>
</div>

<br>
<br>
<br>
<br>

<em>Note: Values are rounded to the nearest hundredth decimal place after conversion.</em>

</body>
</html>
