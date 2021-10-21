<?php
    //$path_parts ='/upload';
    function aasort (&$array, $key) {
        $sorter = array();
        $ret = array();
        reset($array);
        foreach ($array as $ii => $va) {
            $sorter[$ii] = $va[$key];
        }
        asort($sorter);
        foreach ($sorter as $ii => $va) {
            $ret[$ii] = $array[$ii];
        }
        $array = $ret;
    }

    $data = [];
    foreach (new DirectoryIterator("./upload") as $fileInfo) {
            if($fileInfo->isDot())
                continue;
            $tmpArr = array(
                'name'=>$fileInfo->getBasename(),
                'size'=>$fileInfo->getSize(),
                'type'=>$fileInfo->getType(),
                'date'=> $fileInfo->getMTime() //date("Y-m-d H:i:s",)
            );
            array_push($data,$tmpArr);
    }
    $name = isset($_POST['name']) ? $_POST['name']:false;
    $date =isset($_POST['date']) ? $_POST['date'] : false;

    if($name){
        aasort($data,'name');
    }
    if($date){
        aasort($data,'date');
    }


?>
<form action="ex2.php" method="post">
<input type="submit" name="date" value="Date">
<input type="submit" name="name" value="Name">
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Size</th>
        <th>Type</th>
        <th>Date</th>
    </tr>
        <?php
        foreach ($data as $arr) {
            print ("<tr>");
            $time = date("Y-m-d H:i:s",$arr["date"]);
            print ("<th>$arr[name]</th><th>$arr[size]</th><th>$arr[type]</th><th>$time</th>");
            print ("</tr>");
        }
        ?>
</table>