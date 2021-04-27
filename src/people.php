<html>
    <head>
  
    <link rel = "stylesheet" href = "people.css">  <!--stylesheet-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script> 

    <script> /*this loads the header*/
        $(function(){ 
           $("#header").load("header.html");  
        }); 
    </script>

    
    </head>
    <body>

    <div id="header"></div> <!--loading header-->
    <br>

    <!-------navigation-------->
    <div class="navigation"> 
    <div class="drop">
                <button class="dropbtn">Faculty
                <!--<i class="fa fa-caret-down"></i>-->  
                </button>
                <div class="drop-content">
                  <a class = "content-btn" href = "#directors">Director</a> 
                  <a class = "content-btn" href = "#professors">Professors</a>
                  <a class = "content-btn" href = "#facultylecturers">Faculty Lecturers</a>
                  <a class = "content-btn" href = "#adjunctprofessors">Adjunct Professors</a> 
                  <a class = "content-btn" href = "#associatemembers">Associate Members</a>
                  <a class = "content-btn" href = "#emeritusprofessors">Emeritus Professors</a>                  
                  <a class = "content-btn" href = "#formerprofessors">Former Professors</a> 
                  <a class = "content-btn" href = "#inmemoriam">In Memoriam</a>
                </div>
            </div>

            <div class="drop">
                <button class="dropbtn">Staff

                </button>
                <div class="drop-content">
                    <a class = "content-btn" onclick="changeContent('gradoverview.html')">Administrative Staff</a>
                    <a class = "content-btn">System Staff</a>
                </div>
            </div>

            <div class="drop">
                <button class="dropbtn">Community

                </button>
                <div class="drop-content">
                    <a class = "content-btn">Overview</a>
                    <a class = "content-btn">Applying</a>
                </div>
            </div>
    </div>




    <div class="content">  <!--this div contains faculty information-->

        <!--------------------------------------DIRECTOR------------------------------------------->
        <div class="facultysections" id="directors">
           <div class="heading">Director of the School</div><br><br>

           <form action="" method="POST" enctype="multipart/form-data">
           <?php
            $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
            if($conn-> connect_error){
                die("Connection failed:" . $conn-> connect_error);
            }

            $sql = "SELECT * FROM `people` WHERE Category = 'DIRECTOR'";  /* table name : adr */
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){  
                    echo "<div class = 'facultybox'>";
                    echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                    echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:160px;">';
                    echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";
                    echo "</div>";
                }                     
            }
            else {
                echo "0 result";
            }

            $conn-> close();
            ?> 
            </form>  
        </div>


        <!--Associate Director of Research-->
        <div class="facultysections">
           <div class="heading">Associate Director of Research</div><br><br>

           <form action="" method="POST" enctype="multipart/form-data">
           <?php
            $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
            if($conn-> connect_error){
                die("Connection failed:" . $conn-> connect_error);
            }

            $sql = "SELECT * FROM `people` WHERE Category = 'ASSOCIATE DIRECTOR' ";  /* table name : adr */
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){  
                    echo "<div class = 'facultybox'>";
                    echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                    echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:180px;">';
                    echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";

                    echo "</div>";
                }                     
            }
            else {
                echo "0 result";
            }

            $conn-> close();
            ?> 
            </form>  
        </div>


        <!---------professors--------->
         <div class="facultysections" id="professors">
           <br>
           <div class="heading">Professors</div>
           <br><br>
        
           <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
            if($conn-> connect_error){
                die("Connection failed:" . $conn-> connect_error);

            }

            $sql = "SELECT * FROM `people` WHERE Category = 'PROFESSOR'";
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
               // echo "<tr>";
                while($row = $result-> fetch_assoc()){  
                    echo "<div class = 'facultybox'>";
                    echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                    echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:160px;">';
                    echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";
                    echo "</div>";
    
                }
            }
            else {
                echo "0 result";
            }

            $conn-> close();
            ?>      
            </form>     
            <br>
        </div> 


         <!----FACULTY LECTURERS----->
        <div class="facultysections" id="facultylecturers"><br>
        <div class="heading">Faculty Lecturers</div>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        <?php

        $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
        if($conn-> connect_error){
            die("Connection failed:" . $conn-> connect_error);

        }

        $sql = "SELECT * FROM `people` WHERE Category = 'FACULTY LECTURER'";
        $result = $conn-> query($sql);

        if($result-> num_rows > 0){
           // echo "<tr>";
            while($row = $result-> fetch_assoc()){  
                echo "<div class = 'facultybox'>";
                echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:160px;">';         
                echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";
                echo "</div>";
            }

        }
        else {
            echo "0 result";
        }

        $conn-> close();
        ?> 

        </form>

        <br>
        </div>



           <!---------adjunct professors--------->
           <div class="facultysections" id="adjunctprofessors">
           <br>
           <div class="heading">Adjunct Professors</div>
           <br><br>
        
           <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
            if($conn-> connect_error){
                die("Connection failed:" . $conn-> connect_error);

            }

            $sql = "SELECT * FROM `people` WHERE Category = 'ADJUNCT PROFESSOR'";
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
               // echo "<tr>";
                while($row = $result-> fetch_assoc()){  
                    echo "<div class = 'facultybox'>";
                    echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                    echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:160px;">';
                    echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";
                    echo "</div>";
    
                }
            }
            else {
                echo "0 result";
            }

            $conn-> close();
            ?>      
            </form>     
            <br>
        </div>


        <!---------associate members--------->
        <div class="facultysections" id="associatemembers">
           <br>
           <div class="heading">Associate Members</div>
           <br><br>
        
           <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
            if($conn-> connect_error){
                die("Connection failed:" . $conn-> connect_error);

            }

            $sql = "SELECT * FROM `people` WHERE Category = 'ASSOCIATE MEMBER'";
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
               // echo "<tr>";
                while($row = $result-> fetch_assoc()){  
                    echo "<div class = 'facultybox'>";
                    echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                    echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:160px;">';
                    echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";
                    echo "</div>";
    
                }
            }
            else {
                echo "0 result";
            }

            $conn-> close();
            ?>      
            </form>     
            <br>
        </div>

        <!---------emeritus professors--------->
        <div class="facultysections" id="emeritusprofessors">
           <br>
           <div class="heading">Emeritus Professors</div>
           <br><br>
        
           <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
            if($conn-> connect_error){
                die("Connection failed:" . $conn-> connect_error);

            }

            $sql = "SELECT * FROM `people` WHERE Category = 'EMERITUS PROFESSOR'";
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
               // echo "<tr>";
                while($row = $result-> fetch_assoc()){  
                    echo "<div class = 'facultybox'>";
                    echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                    echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:160px;">';
                    echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";
                    echo "</div>";
    
                }
            }
            else {
                echo "0 result";
            }

            $conn-> close();
            ?>      
            </form>     
            <br>
        </div>


                <!---------former professors--------->
                <div class="facultysections" id="formerprofessors">
           <br>
           <div class="heading">Former Professors</div>
           <br><br>
        
           <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
            if($conn-> connect_error){
                die("Connection failed:" . $conn-> connect_error);

            }

            $sql = "SELECT * FROM `people` WHERE Category = 'FORMER PROFESSOR'";
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
               // echo "<tr>";
                while($row = $result-> fetch_assoc()){  
                    echo "<div class = 'facultybox'>";
                    echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                    echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:160px;">';
                    echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";
                    echo "</div>";
    
                }
            }
            else {
                echo "0 result";
            }

            $conn-> close();
            ?>      
            </form>     
            <br>
        </div>


                <!---------IN MEMORIam--------->
                <div class="facultysections" id="inmemoriam">
           <br>
           <div class="heading">In Memoriam</div>
           <br><br>
        
           <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");
            if($conn-> connect_error){
                die("Connection failed:" . $conn-> connect_error);

            }

            $sql = "SELECT * FROM `people` WHERE Category = 'IN MEMORIAM'";
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
               // echo "<tr>";
                while($row = $result-> fetch_assoc()){  
                    echo "<div class = 'facultybox'>";
                    echo "<div class = 'facultyinfo'><p class = 'subheading'>" . $row["Firstname"] . " " . $row["Lastname"] . "</p><br>" . $row["Research"] . "</div>";
                    echo '<img class = "picture" src = "data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="height:160px;">';
                    echo "<div class = 'facultyboxdropcontent'>" . $row['Website'] . '<br><br>' . $row['Office'] . '<br><br>' . $row['Phone']. '<br><br>' . $row['Email'] . "</div>";
                    echo "</div>";
    
                }
            }
            else {
                echo "0 result";
            }

            $conn-> close();
            ?>      
            </form>     
            <br>
        </div>



    </div>

    <div class="foot">
            <p style="margin: 0;">All content related requests should be sent to webadmin@cs.mcgill.ca</p>
            <p>© McGill University 2020 Credits</p>
    </div>

    </body>

</html>