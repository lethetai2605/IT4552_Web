<html>

<head>
    <title>Function Test</title>
</head>

<body>
    <?php
    function convert_degree($inp, $type)
    {
        if ($type == "degree") {
            return deg2rad($inp);
        } else if ($type == "radian") {
            return rad2deg($inp);
        }else{
            return null;
        }
    }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <h3>Convert radians to degrees and vice versa. </h3>
        <label for="inp">Input: </label>
        <input type="text" name="inp" id="inp"><br>
        <label>Type: </label>
        <input type="radio" name="typ" value="degree"> Degree 
        <input type="radio" name="typ" value="radian"> Radian
        <br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
    <?php
        if(array_key_exists("inp",$_POST) && array_key_exists("typ",$_POST)){
            $inp = $_POST["inp"];
            $typ = $_POST["typ"];
            $change_value = convert_degree($inp,$typ);
            print("Change value: $change_value");
        }
    ?>
</body>

</html>