<html>

<head>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="subpage.css">
    <script>
        $(function () {
            $("#header").load("header.html");
        });
    </script>

    <script>
        function moveTo(str) {
            location.replace(str)
        }
    </script>
</head>

<body>

    <div id="header"></div>
    <!--loading header-->
    <!----------------------------------- Slideshow container ------------------------------------->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <img src="../img/pic1.png" style="width:100%; height: 350px;">
            <div class="text" style="color: white; font-weight: 400;">Update on Remote Course Delivery in Computer
                Science &nbsp <a href="#" style="text-decoration: none; color: red;"
                    onclick="moveTo('remotelearning.html')">see more ...</a>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="../img/lab.png" style="width:100%; height: 350px;">
            <div class="text">Update on Remote Course Delivery in Computer Science &nbsp <a href="#"
                    style="text-decoration: none; color: red;" onclick="moveTo('remotelearning.html')">see more ...</a>
            </div>
        </div>


        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <!----------------------------------- Slideshow container ENDS HERE ------------------------------------->

    <div style="height: 40px;"></div>

    <!----------------------------------- New div ------------------------------------->

    <div class="rowsecond">

        <!----------------------------latest@CS----------------------------------->
        <div class="column">

            <div style="background-image: url('usenow.png')  ; height: 60px;">
                <p style="font-size: 20px; color: red; padding-left: 10px; padding-top: 10px;">
                    latest@cs
                    <a href="#" onclick="moveTo('news.php')"
                        style="font-size: 12px; text-decoration: none;color: rgb(255, 255, 255);">more...</a>
                </p>
            </div>

            <!----------- php reads latest news from database ------------>
            <?php

                    $conn = mysqli_connect("localhost","cs307-group23","","cs307-group23-DB");  /* database name : news */
                    if($conn-> connect_error){
                        die("Connection failed:" . $conn-> connect_error);            
                    }
            
                    $sql = "SELECT * FROM `News`";  /* table name : News */
                    $result = $conn-> query($sql);
                    $count = 1;
            
                    if($result-> num_rows > 0){
                        while($row = $result-> fetch_assoc()){                  
                            if($count > 4) break; 
                            echo "<button class = 'news'><br>" . $row["title"] . "<br>" . $row["datetimeadded"] . "&nbsp &nbsp" . $row["category"] . "<br><br></button>";
                            $count = $count + 1;  /* only show four events/news  */
                        }
            
                    }
                    else {
                        echo "0 result";
                    }
            
                    $conn-> close();
                    ?>

        </div>
        <!----------------------------latest@CS ENDS HERE----------------------------------->


        <!----------------------------events@CS----------------------------------->
        <div class="column-mid">
            <div style="background-image: url('../img/trottier.png') ; height: 60px;">
                <p style="font-size: 20px; color: rgb(0, 255, 34); padding-left: 10px; padding-top: 12px;">
                    events@cs
                    <a href="#" style="font-size: 12px; text-decoration: none;color: rgb(255, 255, 255);">more...</a>
                </p>


            </div>
            <div style="height: 330px; background-color: #ebebeb; width: 100%;">

            </div>
        </div>
        <!----------------------------events@CS ENDS HERE ----------------------------------->


        <!----------------------------postings@CS----------------------------------->
        <div class="column">

            <div style="background-image: url('../img/trottier2.png'); height: 60px;">
                <p style="font-size: 20px; color: red; padding-left: 10px; padding-top: 12px;">
                    postings@cs
                    <a href="#" style="font-size: 12px; text-decoration: none;color: rgb(255, 255, 255);">more...</a>
                </p>


            </div>
            <button class="data">
                Three SOCS professors are awarded large grants to use AI to understand cancer
                <br><br>Oct 27th, 2020
            </button>

            <button class="data">
                Assistant Professor Oana Balmau wins CORE John Makepeace Bennett Award
                <br><br>Oct 27th, 2020
            </button>

            <button class="data">
                Assistant Professor Oana Balmau wins CORE John Makepeace Bennett Award
                <br><br>Oct 27th, 2020
            </button>

            <button class="data">
                Assistant Professor Oana Balmau wins CORE John Makepeace Bennett Award
                <br><br>Oct 27th, 2020
            </button>

        </div>
    </div>

    <!----------------------------postings@CS ENDS HERE----------------------------------->

    <div style=" height: 50px;  "></div>

    <footer>
        <div class="footer">
            <p style="margin: 0;">All content related requests should be sent to webadmin@cs.mcgill.ca</p>
            <p>© McGill University 2020 Credits</p>
        </div>

    </footer>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>

</body>

</html>
