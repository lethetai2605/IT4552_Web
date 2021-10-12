<html>

<head>
    <title>Date Time Function</title>
</head>

<body>
    <?php
    function processDate($dob_1, $dob_2)
    {
        $day1 = DateTime::createFromFormat('Y-m-d',$dob_1);
        $day2 = DateTime::createFromFormat('Y-m-d',$dob_2);
        $mess1 = $day1->format('l, F, Y');
        $mess2 = $day2->format('l, F, Y');
        print("Display 2 entered date <br>");
        print "$mess1 <br>";
        print "$mess2 <br>";

        $different = date_diff($day1,$day2);
        $diff = $different->format("%R%a days");
        print("Different between 2 days: $diff <br>");
        $today   = new DateTime('today');

        $year_old_1 = date_diff($day1,$today);
        $year_old_2 = date_diff($day2,$today);

        if(((int)($year_old_1->format("%R%a")))>=0 && ((int)($year_old_2->format("%R%a")))>=0){
            $age_1 = $year_old_1->format("%Y");
            $age_2 = $year_old_2->format("%Y");
            $diff_age = abs($age_1 - $age_2);
            print("Age of person 1 is $age_1 <br>");
            print("Age of person 2 is $age_2 <br>"); 
            print("Different age: $diff_age <br>");
        }else{
            print("Your inserted day is so far <br>");
        }    
    }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        Enter user 1 birth day: <input type="date" id="dob_1" name="dob_1"><br>
        Enter user 2 birth day: <input type="date" id="dob_2" name="dob_2"><br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset"><br>
    </form>
    <?php
    if (array_key_exists("dob_1", $_GET) && array_key_exists("dob_2", $_GET)) {
       
        $dob_1 = $_GET["dob_1"];
        $dob_2 = $_GET["dob_2"];
        processDate($dob_1,$dob_2);   
    }

    ?>
</body>

</html>