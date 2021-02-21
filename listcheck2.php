<html>

<head>
    <title>Trip</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,height=device-height">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../extentions/css/planvele.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="icon" href="/pic/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/pic/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php

    $objConnect = mysqli_connect("localhost", "root", "", "db_gis") or die("Error Connect to Database");
    // $objDB = mysql_select_db("mydatabase");
    $strSQL = "SELECT time_created,trip_name,location_name,location_detail,image_name,image_trip_name,time_use,travel_type,time_travel FROM tbl_location  where(trip_name) in (select trip_name from tbl_location group by trip_name having count(trip_name) >='2' ) 
                and (time_created) in (select MAX(time_created) from tbl_location order by time_created ASC)";

    $strSQL2 = "SELECT MAX(trip_name) FROM tbl_location  where time_created ";

    // where(trip_name) in (select trip_name from tbl_location group by trip_name having count(trip_name) >='2',  )

    $objQuery2 = mysqli_query($objConnect, $strSQL2) or die("Error Query [" . $strSQL2 . "]");


    $objQuery = mysqli_query($objConnect, $strSQL) or die("Error Query [" . $strSQL . "]");

    // print_r($objQuery);

    ?>
    <table class="showtripcontainer justify-content-center tripblock" width="600" border="0">
        <tr>

            <th width="97">
                <div align="center">time_use </div>
            </th>

            <th width="98" hight="100">
                <div align="center">image_name </div>
            </th>

            <th width="91">
                <div align="center">location_name </div>
            </th>
            <th width="98">
                <div align="center">location_detail </div>
            </th>

            <th width="59">
                <div align="center">travel_type </div>
            </th>

            <th width="59">
                <div align="center">time_travel </div>
            </th>
            <th width="59">
                <div align="center">trip_name </div>
            </th>

        </tr>
        <?php
        while ($objResult = mysqli_fetch_array($objQuery)) {
            $objResult2 = mysqli_fetch_array($objQuery2);
          

            print_r($objResult2);
        ?>



            <tr>

                <td>
                    <div align="center"><?php echo $objResult["time_use"]; ?></div>
                </td>

                <td><?php echo '<img src="images/' . $objResult['image_name'] . '" height="200" width="200" class="img-thumnail" />' ?></td>

                <td>
                    <div align="center"><?php echo $objResult["location_name"]; ?></div>
                </td>
                <td><?php echo $objResult["location_detail"]; ?></td>



                <td align="right"><?php echo $objResult["travel_type"]; ?></td>

                <td align="right"><?php echo $objResult["time_travel"]; ?></td>
                <td align="right"><?php echo $objResult["trip_name"]; ?></td>

            </tr>
        <?php
        }
        ?>
    </table>

    <?php
    $objResult2 = mysqli_fetch_object($objQuery2);
    
    print_r($objResult2);
  echo ' $objResult2["trip_name"]; '
    ?>

    <?php
    mysqli_close($objConnect);
    ?>
</body>

</html>