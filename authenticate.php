<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <title>quickbase access</title>
  </head>
  <body>
  <?php
        function callAPIs($password,$username){
                    // Get cURL resource
            $user = (string) $username;
            $pass = (string) $password;
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://namanbansal.quickbase.com/db/main?a=API_Authenticate&username=$user&password=$pass&hours=24",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: a3be6530-f876-dd9d-9a32-844b49cffbf4"
            ),
            ));

            // Send the request & save response to $resp
            $resp = curl_exec($curl);
            // Close request to clear up some resources
            $xml = simplexml_load_string($resp);
            $ticket = (string) $xml->ticket;
            $err = curl_error($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            //   echo $response;
            }



            // echo $ticket;
            curl_close($curl);


            echo "\n\n";

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://namanbansal.quickbase.com/db/bnpjxg2nr?a=API_DoQuery&includeRids=1&ticket=$ticket&apptoken=h5x299cur9ru4by33a2aca6vppi&udata=mydata&query&clist=5.6.7.22.3&slist=3&options=num-4.nosort.skp-10.onlynew&fmt=structured",            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 708fd15e-e0de-47cf-e874-b0676b9ffebf"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            $xml = new SimpleXMLElement($response);

            $names = $xml->xpath('/qdbapi/record/name');
            $technologies = $xml->xpath('/qdbapi/record/technology');
            
            echo "<div class='input-group'><input id='projectsSearch' style='width:30%' class='form-control' placeholder='filters based on name' onkeyup='myFunction(1)' type='text'/>";
            echo "<span class='input-group-btn'><button class='btn btn-dark' onclick='sortTable(1)'>sort</button></span></div>";
            echo "<table class='table table-dark' id='projectsTable'>";
            echo "<tr><center><th><h3>Projects</h3></th></center></tr>";
            echo "<tr><th>#</th><th>Name</th><th>Technology</th></tr>";
            $counta = 1;
            for($i=0, $count = count($names);$i<$count;$i++) {
                echo "<tr><td>$counta</td>" ;
                echo "<td>$names[$i]</td>" ;
                echo "<td>$technologies[$i]</td></tr>";
                $counta++;
            }

            // while(list( , $node) = each($names)) {
            //     echo '/a/b/c: ',$node,"\n";
            // }


            // while(list( , $node) = each($technologies)) {
            //     echo '/a/b/c: ',$node,"\n";
            // }
            // echo $XML_Obj;
            // $arr  = $xml->xpath('//name'); // 23

            // foreach($arr as $value){
            //     echo $value;
            // }
            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            // echo $response;
            }



            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://namanbansal.quickbase.com/db/bnpkmvcr3?a=API_DoQuery&includeRids=1&ticket=$ticket&apptoken=h5x299cur9ru4by33a2aca6vppi&udata=mydata&query&clist=5.6.7.22.3&slist=3&options=num-4.nosort.skp-10.onlynew&fmt=structured",            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 708fd15e-e0de-47cf-e874-b0676b9ffebf"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            $xml = new SimpleXMLElement($response);

            $names = $xml->xpath('/qdbapi/record/title');
            $technologies = $xml->xpath('/qdbapi/record/description');
            
            echo "<table id='achievmentsTable' class='table table-dark'>";
            echo "<tr><center><th><h3>Achievments</h3></th></center></tr>";
            echo "<tr><th>#</th><th>Title</th><th>Description</th></tr>";
            $counta = 1;
            for($i=0, $count = count($names);$i<$count;$i++) {
                echo "<tr><td>$counta</td>" ;
                echo "<td>$names[$i]</td>" ;
                echo "<td>$technologies[$i]</td></tr>";
                $counta++;
            }
            echo "<div class='input-group'><input id='AchievSearch' style='width:30%' class='form-control' placeholder='filters based on title' onkeyup='myFunction(2)' type='text'/>";
            echo "<span class='input-group-btn'><button class='btn btn-dark' onclick='sortTable(2)'>sort</button></span></div>";

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            // echo $response;
            }
        }
  ?>
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
            <a class="nav-link" href="/">logout <span class="sr-only">(current)</span></a>
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
                if($flag == 1){
                    callAPIs($quickbase_password,$quickbase_username);
                }
            ?>

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
    <script type="text/javascript" src="tablefunction.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>