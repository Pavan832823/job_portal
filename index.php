<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Portal - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <a href="index.php" class="logo">AMVT</a>

    <div class="nav-right">
        <a href="#">Jobs</a>
        <a href="#">Courses</a>

        <?php if (isset($_SESSION['username'])) { ?>
            <div class="profile-menu">
                <div class="profile-trigger" id="profileToggle">
                    <img src="uploads/photos/<?php echo $_SESSION['photo']; ?>" class="profile-img">
                    <span class="profile-name"><?php echo $_SESSION['username']; ?></span>
                </div>

                <div class="dropdown" id="profileDropdown">
                    <a href="#">Courses</a>
                    <a href="#">Jobs</a>

                    <?php if (!empty($_SESSION['resume'])) { ?>
                        <a href="uploads/resumes/<?php echo $_SESSION['resume']; ?>" target="_blank">
                            Resume
                        </a>
                    <?php } ?>

                    <a href="php/logout.php">Logout</a>
                </div>
            </div>
        <?php } else { ?>
            <a href="login.html">Login</a>
        <?php } ?>
    </div>
</div>

<div class="hero">
    <img src="images.jpg" alt="Background">

    <!-- Overlay -->
    <div class="hero-overlay"></div>

    <!-- Text Content -->
    <div class="hero-content">
        <h1>Build Your Career with AMVT</h1>
        <p>Explore jobs, courses, and opportunities tailored for you</p>

        <?php if (isset($_SESSION['username'])) { ?>
            <a href="#" class="cta-btn">Explore Enrolled</a>
        <?php } else { ?>
            <a href="login.html" class="cta-btn">Get Started</a>
        <?php } ?>
    </div>
</div>



<div class="footer">
    AMVT
</div>

<script>
const toggle = document.getElementById("profileToggle");
const dropdown = document.getElementById("profileDropdown");

if (toggle && dropdown) {
    toggle.addEventListener("click", function (e) {
        e.stopPropagation();
        dropdown.style.display =
            dropdown.style.display === "block" ? "none" : "block";
    });

    document.addEventListener("click", function () {
        dropdown.style.display = "none";
    });
}
</script>

</body>
</html>
