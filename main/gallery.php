<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css">

    <title>Gallery</title>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="../assets/JF_white.png" alt="asd"></a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="text-light nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link active" aria-current="page" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link" href="socials.php">Socials</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <p class="text-center text-light text-uppercase fw-bolder">Gallery</p>
    <section class="photo-grid-container">
        <?php
        $all_files = glob("../renders/*.*");
        for ($i = 0; $i < count($all_files); $i++) {
            $image_n = $all_files[$i];
            $remove = ["../renders/", ".png", ".jpg"];
            $image_name = str_replace($remove, '', $image_n);
            echo '<div class="photo-grid-item">';
            echo '<img class="scrimg" src="' . $image_n . '" alt="' . $image_name . '" id="' . $image_name . '" />' . "<br /><br />";
            echo '</div>';
            // echo $imgs = str_replace('../renders/', '', $image_name);
        ?>
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("<?php echo $image_name;  ?>");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                    // scr_img.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                // When the user clicks on <span> (x), close the modal
                span.onclick = function(event) {
                    modal.style.display = "none";
                }
            </script>
        <?php
        }
        ?>
    </section>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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