<!DOCTYPE html>
<html>
    <head>
        <title>All Restaurants</title>
        <link rel = "stylesheet" href= "index.css">
    </head>
    
    <body>
        <!--Header for every page-->
        <h1>
        <center>
        <table height="70px">
            <tr>
                <td class=""><a href="Index.php" style="color:white;text-decoration:none;">RSGC Lunch Routes</a></td>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <td><input type="text" name="search" class="search" style="width:300px; font-family: 'Times New Roman', Times, serif;
        font-size:25px;"></td>
        <td><button type="submit" style="width:5em;font-size:15pt;background-color:#065da5;">Search</button></td>
        </form>
<?php
        
        $provided_entry = htmlspecialchars($_POST['search']);
        // Connect to database
        $host = "209.236.71.62";
        $user = "mrgogor3_RRUSR";
        $pass = "fries278\mango";
        $db = "mrgogor3_RR";
        $port = 3306;
        
        // Establish the connection
        // (note username and password here is the *database* username and password, not for a user of this website)
        $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());
        
        
        $query = "SELECT id FROM restaurant WHERE name = ('" . $provided_entry . "');"; 
      
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        
        if($row['id'] != ""){
        header("Location: https://lunches-official-rsgc-kelly-c.c9users.io/lunches/HTML/profile.php?id='".$row['id']. "'");
        exit;}
        ?>
        
        
        <td><a href="Logout.php"><button class="Button1" style="font-size:15pt;background-color:#7FBCEF:">Sign-Out</button></a></td>
        <td style="font-size:20pt">| <?php echo $_SESSION['fname']; ?></td>
            </tr>
        </table>
        </center>
        </h1>  
        
        <div class="pageCenter">
        <center>   
        <h3>All Restaurants</h3>
        </center>
        <br> <br>
<?php
    //instantiate the required variables to connect to the db
    $host = "209.236.71.62";
    $user = "mrgogor3_RRUSR";
    $pass = "fries278\mango";
    $db = "mrgogor3_RR";
    $port = 3306;
    
    
    // Establish the connection
    // (note username and password here is the *database* username and password, not for a user of this website)
    $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());
    
    // Run the query
    if (isset($_GET['id'])) {
        $query = "SELECT name, address, timeToWalk, id FROM restaurant;";    
        $cid = $_GET['id'];
    } else {
        $query = "SELECT name, address, timeToWalk, id FROM restaurant;";
        $cid = 1;
    }
    
    $result = mysqli_query($connection, $query);

    // Get the row from the database
    $num = 1;
    echo "<table style='margin-top: 5px; 
            text-align: center;
            padding-top: 2px;
            padding-bottom: 2px;
            width:auto;
            color: #000000;'>
            <tr>
                <th style ='width: 50%;'>Restaurant</th>
                <th style ='width: 25%;'>Location</th>
                <th style ='width: 25%;'>Description</th>
            </tr style='padding-bottom:1em;'>";
            
    while($row = mysqli_fetch_assoc($result)) {
       
       
        echo "<tr style='border:1px;'>";
        echo "<td style='width:50%;border:7px;'><b><a style='color:blue;text-decoration:none;background-color;' href='profile.php?id=" . $num . "'>" .  $row["name"] . "</a></b></td>";
        echo "<td style= 'width: 25%;
                '>". $row["address"]. "</td>";
        echo "<td style= 'width: 25%;
                '>". $row["timeToWalk"]. "</td>";
        echo "</tr></div>";
        $num +=1;
    }
    echo "</table>";
?>


       
        </div>
    </body>
</html>