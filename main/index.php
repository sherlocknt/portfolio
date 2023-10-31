<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/index.css">
    <title>Home</title>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="../assets/img/JF_white.png" alt="asd"></a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="text-light nav-link active" aria-current="page" href="index.php"><p class=" hoverAnim">Home</p></a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link" href="gallery.php"><p class=" hoverAnim">Gallery</p></a>
                    </li>
                    <li class="nav-item">
                        <a class="text-light nav-link" href="socials.php"><p class=" hoverAnim">Socials</p></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container center">
        <video id="vid" src="../assets/vids/mr2.mp4" class="object-fit-fill" type="video/mp4" autoplay loop muted></video>
    </div>
    <script>
        document.getElementById('vid').play();
    </script>
    <?php ?>
</body>

</html>