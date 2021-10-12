<html>

<head>
    <title>Date Time Processing</title>
</head>

<body>
    <h2 style="text-align:center">Date Time Processing</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        <?php
        if (array_key_exists("name", $_GET)) {
            $name = $_GET["name"];
        } else {
            $name = null;
        }
        if (array_key_exists("hour", $_GET)) {
            $hour = $_GET["hour"];
        } else {
            $hour = 0;
        }
        if (array_key_exists("minute", $_GET)) {
            $minute = $_GET["minute"];
        } else {
            $minute = 0;
        }
        if (array_key_exists("second", $_GET)) {
            $second = $_GET["second"];
        } else {
            $second = 0;
        }
        if (array_key_exists("date", $_GET)) {
            $date = $_GET["date"];
        } else {
            $date = 1;
        }
        if (array_key_exists("month", $_GET)) {
            $month = $_GET["month"];
        } else {
            $month = 1;
        }
        if (array_key_exists("year", $_GET)) {
            $year = $_GET["year"];
        } else {
            $year = 2020;
        }
        ?>

        <table>
            <tr>
                <td>Your name: </td>
                <td colspan="3">
                    <input type="text" name="name" value="<?php print("$name"); ?>">
                </td>
            </tr>
            <tr>
                <td>Date: </td>
                <td>
                    <select name="date">
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            if ($date == $i) {
                                print("<option selected>$i</option>");
                            } else {
                                print("<option>$i</option>");
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="month">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            if ($month == $i) {
                                print("<option selected>$i</option>");
                            } else {
                                print("<option>$i</option>");
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="year">
                        <?php
                        for ($i = 2021; $i >= 0; $i--) {
                            if ($year == $i) {
                                print("<option selected>$i</option>");
                            } else {
                                print("<option>$i</option>");
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Time: </td>
                <td>
                    <select name="hour">
                        <?php
                        for ($i = 0; $i <= 23; $i++) {
                            if ($hour == $i) {
                                print("<option selected>$i</option>");
                            } else {
                                print("<option>$i</option>");
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="minute">
                        <?php
                        for ($i = 0; $i <= 59; $i++) {
                            if ($minute == $i) {
                                print("<option selected>$i</option>");
                            } else {
                                print("<option>$i</option>");
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="second">
                        <?php
                        for ($i = 0; $i <= 59; $i++) {
                            if ($second == $i) {
                                print("<option selected>$i</option>");
                            } else {
                                print("<option>$i</option>");
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="2"> <input type="submit" value="Submit"></td>
                <td align="left" colspan="2"><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    <?php
    if (array_key_exists("name", $_GET)) {
        $name = $_GET["name"]."!";
        print("Hi $name<br>");
    }
    if (
        array_key_exists("date", $_GET)
        && array_key_exists("month", $_GET)
        && array_key_exists("year", $_GET)
    ) {
        $date = $_GET["date"];
        $month = $_GET["month"];
        $year = $_GET["year"];
        $month_31 = array(1, 3, 5, 7, 8, 10, 12);
        $month_30 = array(4, 6, 9, 11);
        $key_1 = true; //check nam nhuan
        $key_2 = true;

        if ($year % 4 == 0) {
            if ($year % 100 == 0 && $year % 400 != 0) {
                $key_1 = false;
            }
        } else {
            $key_1 = false;
        }

        if (in_array($month, $month_31)) {
            if ($date > 31) {
                print("Your date is not correct<br>");
                $key_2 = false;
            }
        } else if (in_array($month, $month_30)) {
            if ($date > 30) {
                print("Your date is not correct<br>");
                $key_2 = false;
            }
        } else if ($month == 2) {
            if ($key_1 == true) {
                if ($date > 29) {
                    print("Your date is not correct<br>");
                    $key_2 = false;
                }
            }else{
                if ($date > 28) {
                    print("Your date is not correct<br>");
                    $key_2 = false;
                }
            }
        }

        if($key_2 == true){
            print("You have choose to have an appointment on $hour:$minute:$second, $date/$month/$year<br>");
            print("More information<br>");
            if($hour > 12){
                $temp = $hour - 12;
                print("In 12 hours, the time and date is $temp:$minute:$second, $date/$month/$year PM<br>");
            }else{
                print("In 12 hours, the time and date is $hour:$minute:$second, $date/$month/$year AM<br>");
            }
            if(in_array($month,$month_31)) {
                $date = 31;
            }
            else if(in_array($month,$month_30)) {
                $date = 30;
            }
            else if($key_1 == true ) {
                $date = 29;
            }
            else $date = 28;
            print("This month has $date days");
        }
        
    }
    ?>
</body>

</html>