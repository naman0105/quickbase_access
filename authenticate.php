<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="quickbase.browserify.min.js"></script>
    <script src="index.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Quickbase Database</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-auto">
            <a class="nav-link" href="/normalapp">logout <span class="sr-only">(current)</span></a>
        </li>
        </ul>
    </div>
  </nav>
    <div class="container" style="margin-top:30px">
        <div class="jumbotron">
            <?php
                include "dbconnect.php";
                $quickbase_username = "";
                $quickbase_password = "";
                $username =  $_POST['username'];
                $password =  $_POST['password'];
                $sql1 = "select * from login";
                $result = $conn->query($sql1);
                $flag = 0;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row['username'] == $username && $row['password'] == $password){
                            $quickbase_username = $row['quickbaseusername'];
                            $quickbase_password = $row['quickbasepassword'];
                            // echo $quickbase_password;
                            // echo $quickbase_username;
                            $flag = 1;
                            break;
                        }
                    }
                }
                if($flag == 0){
                    echo "<hr><h3>Username or Password not valid</h3><hr>";
                }
                if($flag == 1){ ?>
                    <script type="text/javascript">
                        var username = "<?php echo $quickbase_username ?>";
                        var password = "<?php echo $quickbase_password ?>";
                        getDataFromQuickbase(username, password);
                    </script>
                <?php }?>

            <h3 id="table1"></h3>
            <table id="resulttable" class="table table-dark">

            </table>
            <h3 id="table2"></h3>
            <table id="resulttable1" class="table table-dark">
                
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>