<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class="maincontainer">
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
                <h1>Temperature Converter</h1>
                <h3>Enter Temperature: <br><input class="tempinput" type="number" name="Temperature" /></h3>
                <input type="radio" name="FromTempUnit" value="Fahrenheit" checked> Fahrenheit
                <input type="radio" name="FromTempUnit" value="Celsius"> Celsius
                <input type="radio" name="FromTempUnit" value="Kelvin"> Kelvin
                <input type="radio" name="FromTempUnit" value="Rankine"> Rankine
                <p></p>
                <input type="submit" id="convert" value="Convert"/>
            </form>
            ';

            function convertToF($t) {
                return ($t * 9 / 5) + 32;
            }

            function convertToC($t) {
                return ($t - 32) * 5 / 9;
            }

            ?>
            
            <em>Note: Values are rounded to the nearest hundredth decimal place after conversion.</em>
            <br>
            <br>
            
            <div id="conversions">
                <!-- <p>Input: <?php if (isset($InputTemp) && isset($InputUnit)) echo $InputTemp . '&deg; ' . $InputUnit; ?></p>


                <a id="f">Fahrenheit: <?php if (isset($ftemp)) echo round($ftemp, 2); ?>&deg;F</a>
                <div class="unitInfo"><iframe src="https://en.wikipedia.org/w/index.php?title=Fahrenheit&printable=yes"></iframe>
                </div>

                <br>
                <br>

                <a id="c">Celsius: <?php if (isset($ctemp)) echo round($ctemp, 2); ?>&deg;C</a>
                <div class="unitInfo"><iframe src="https://en.wikipedia.org/w/index.php?title=Celsius&printable=yes"></iframe>
                </div>

                <br>
                <br>

                <a id="k">Kelvin: <?php if (isset($ktemp)) echo round($ktemp, 2); ?>&deg;K</a>
                <div class="unitInfo"><iframe src="https://en.wikipedia.org/w/index.php?title=Kelvin&printable=yes"></iframe>
                </div>

                <br>
                <br>

                <a id="r">Rankine: <?php if (isset($rtemp)) echo round($rtemp, 2); ?>&deg;Ra</a>
                <div class="unitInfo"><iframe src="https://en.wikipedia.org/w/index.php?title=Rankine_scale&printable=yes"></iframe>
                </div> -->

                <div class="unitInfo">
                    <a href="https://en.wikipedia.org/w/index.php?title=Fahrenheit&printable=yes" target="iframe_a" id="f">Fahrenheit: <?php if (isset($ftemp)) echo round($ftemp, 2); ?>&deg;F</a>
                </div>

                <br>

                <div class="unitInfo">
                    <a href="https://en.wikipedia.org/w/index.php?title=Celsius&printable=yes" target="iframe_a" id="c">Celsius: <?php if (isset($ctemp)) echo round($ctemp, 2); ?>&deg;C</a>
                </div>

                <br>

                <div class="unitInfo">
                    <a href="https://en.wikipedia.org/w/index.php?title=Kelvin&printable=yes" target="iframe_a" id="k">Kelvin: <?php if (isset($ktemp)) echo round($ktemp, 2); ?>&deg;K</a>
                </div>

                <br>

                <div class="unitInfo">
                    <a href="https://en.wikipedia.org/w/index.php?title=Rankine_scale&printable=yes" target="iframe_a" id="r">Rankine: <?php if (isset($rtemp)) echo round($rtemp, 2); ?>&deg;Ra</a>
                </div>
                
            </div>

            <br>

            <div id="iframecontainer">
                <iframe name="iframe_a" srcdoc="<h3>For more information please select one of the temperature links above:</h3>"></iframe>
            </div>

        </div>
    </body>
    <!-- <script>
        document.getElementById("conversions").style.display = "none";
        document.getElementById("convert").onclick = function() {
            document.getElementById("conversions").style.display = "block";
        };
    </script> -->
</html>
