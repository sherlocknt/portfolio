<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_likes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$sqla = "SELECT title FROM tutorial";
$resulta = $conn->query($sqla);

// require_once __DIR__ . '/DataSource.php';
// $database = new DataSource();
// $query = "SELECT * FROM tutorial";
// $result = $database->select($query);
// // $result = mysqli_query($database, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/index.css">
    <!-- <link rel="stylesheet" href="style/style.scss"> -->
    <!-- <link href="assets/css/styles.css" rel="stylesheet" type="text/css"> -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="assets/js/likes.js"></script> -->
    <link rel="icon" type="image/x-icon" href="assets/icon/jf.ico">
    <title>Gallery</title>
</head>

<body class=bg-dark>
    <nav class="navbar navbar-expand-lg" id="nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="assets/img/JF_white.png" alt="JF Logo"></a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="text-light nav-link" href="index.php">
                            <p class=" hoverAnim">Home</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="gallery.php">
                            <p class="hoverAnim" style="font-family: opensansB !important;">Gallery</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link" href="socials.php">
                            <p class=" hoverAnim">Socials</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link" href="models.php">
                            <p class=" hoverAnim">3D Models</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <button onclick="myFunction()" class="btn btn-primary">Toggle dark mode</button> -->
    <script>
        //dark mode shit
        // function myFunction() {
        //     var element = document.body;
        //     element.classList.toggle("bg-dark");
        //     const pp = document.getElementById("pp");
        //     pp.classList.toggle("text-light");
        //     const ppp = document.getElementById("ppp");
        //     ppp.classList.toggle("text-light");
        //     const navi = document.getElementById("nav");
        //     navi.classList.toggle("bg-dark");
        //     const gal = document.getElementById("gallery");
        //     gal.classList.toggle("text-light");
        // }
    </script>
    <!-- <div class="myDIV">Hover over me.</div>
    <div class="hide">I am shown when someone hovers over the div above.</div> -->
    <p class="text-light text-center text-uppercase fw-bolder fs-2 gal" id="gallery">Gallery</p>

    <div class="masonry-container">
        <?php
        // Connect to the database (you should have a separate PHP file for this)
        $db = new mysqli('localhost', 'root', '', 'likee');

        // Check for database connection errors
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Query the database to fetch images
        $result = $db->query("SELECT * FROM images");

        // Loop through the images and display them
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            // echo '<div class="image-item">';
            // echo '<img src="' . $row['image_url'] . '" alt="Image">';
            // echo '<button data-image-id="' . $row['id'] . '" class="like-button">Like (' . $row['likes'] . ')</button>';
            // echo '</div>';
            $remove = ["renders/", ".png", ".jpg"];
            $image_name = str_replace($remove, '', $row['image_url']);

        ?>
            <div class="masonry-item" id="<?php echo $id; ?>">
                <style>
                    #particle-area {
                        position: relative;
                        width: 100px;
                        height: 100px;
                        display: flex;
                        flex-direction: column-reverse;
                    }

                    .particle<?php echo $id; ?> {
                        z-index: 2;
                        position: absolute;
                        margin-top: 0.5em;
                        margin-left: 1.5em;
                        width: 30px;
                        height: 30px;
                        animation: particle-animation 2s ease-out;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;

                    }

                    @keyframes particle-animation {
                        0% {
                            transform: translate(-50%, -50%) scale(0);
                            opacity: 1;
                        }

                        100% {
                            transform: translate(-50%, -50%) scale(1);
                            opacity: 0;
                        }
                    }
                </style>
                <!-- <h1 class='hart'>❤️</h1> -->
                <!-- <p class="hide">+1</p> -->
                <div id="parti_<?php echo $row['id']; ?>"></div>
                <?php echo '<button data-image-id="' .  $id . '" class="btn btn-dark textt pulse-single" id="' . $id . '"><i class="bi bi-heart"></i></button>'; ?>
                <?php echo '<img style="cursor: zoom-in;" class="render" src="' . $row['image_url'] . '" alt="' . $image_name . '" id="' . $image_name . '">'; ?>

                <span>
                    <div class="row justify-content-between">
                        <div class="text-light" id="names">
                            <p class="img_nm"><?php echo $image_name; ?></p>
                            <?php
                            echo '<div class="image-item">';
                            echo '<div class="like-button-container">';
                            echo '<span class="likes-count ">' . $row['likes'] . ' likes</span>';
                            echo '</div>';
                            echo '</div>';
                            ?>
                        </div>
                        <div id="myModal" class="modal">

                            <span class="close">&times;</span>

                            <img class="modal-content" id="img01">

                            <div id="caption"></div>
                            <!-- <button class="texttt pulse-single">bruh</button> -->
                            <!-- <?php echo '<button data-image-id="' . $row['id'] . '" class="btn btn-dark texttt pulse-single"><i class="bi bi-heart"></i></button>'; ?>
                            <?php echo '<span class="likes-count ">' . $row['likes'] . ' likes</span>'; ?> -->
                        </div>
                        <script>
                            var modal = document.getElementById("myModal");

                            var img = document.getElementById("<?php echo $image_name;  ?>");
                            var modalImg = document.getElementById("img01");
                            var captionText = document.getElementById("caption");
                            img.onclick = function() {
                                modal.style.display = "block";
                                modalImg.src = this.src;
                                captionText.innerHTML = this.alt;
                                // scr_img.innerHTML = this.alt;
                            }

                            var span = document.getElementsByClassName("close")[0];
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                            span.onclick = function(event) {
                                modal.style.display = "none";
                            }

                            function myFunction() {}
                        </script>
                    </div>
                </span>
                <script>
                    const addBtn<?php echo $id; ?> = document.getElementById("<?php echo $id; ?>");
                    const particleBox<?php echo $id; ?> = document.getElementById("parti_<?php echo $id; ?>");
                    // const content = document.getElementById("<?php echo $id; ?>");

                    function createParticle(parentElement<?php echo $id; ?> = document.body) {
                        const particle<?php echo $id; ?> = document.createElement("div");
                        particle<?php echo $id; ?>.classList.add("particle<?php echo $id; ?>");
                        particle<?php echo $id; ?>.innerHTML = "<h1 class='hart'>❤️</h1>";
                        if (parentElement<?php echo $id; ?>) {
                            parentElement<?php echo $id; ?>.append(particle<?php echo $id; ?>);
                            // alert("I am an alert box!");
                        }
                        return particle<?php echo $id; ?>;
                    }

                    addBtn<?php echo $id; ?>.addEventListener("click", function() {
                        const particle<?php echo $id; ?> = createParticle(particleBox<?php echo $id; ?>);
                        particle<?php echo $id; ?>.addEventListener("animationend", function() {
                            particle<?php echo $id; ?>.remove();
                        });
                    });
                </script>
            </div>

        <?php
        }

        // Close the database connection
        $db->close();
        ?>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><img class="arrowUP" src="assets/svg/arrow-up.svg" alt=""></button>
    <script src="assets/js/script.js"></script>
    <script>
        // Get the button:
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    <!-- Trigger the Modal -->
    <!-- <img id="myImg" src="../renders/959.jpg" alt="Snow" style="width:100%;max-width:300px"> -->

    <!-- The Modal -->

</body>

</html>