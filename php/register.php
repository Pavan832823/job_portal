<?php
include "db.php";

$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$confirm   = $_POST['confirm_password'];
$primary   = $_POST['primary_skill'];
$secondary = $_POST['secondary_skill'];

/* Password check */
if ($password !== $confirm) {
    echo "
    <script>
        alert('Passwords do not match!');
        window.history.back();
    </script>
    ";
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

/* PHOTO UPLOAD */
$photoName = time() . "_" . $_FILES['photo']['name'];
$photoTmp  = $_FILES['photo']['tmp_name'];
$photoPath = "../uploads/photos/" . $photoName;

/* RESUME UPLOAD */
$resumeName = time() . "_" . $_FILES['resume']['name'];
$resumeTmp  = $_FILES['resume']['tmp_name'];
$resumePath = "../uploads/resumes/" . $resumeName;

/* Create folders if not exist */
if (!is_dir("../uploads/photos")) {
    mkdir("../uploads/photos", 0777, true);
}
if (!is_dir("../uploads/resumes")) {
    mkdir("../uploads/resumes", 0777, true);
}

/* Upload files */
if (move_uploaded_file($photoTmp, $photoPath) && move_uploaded_file($resumeTmp, $resumePath)) {

    $sql = "INSERT INTO users 
        (firstname, lastname, email, password, primary_skill, secondary_skill, photo, resume)
        VALUES
        ('$firstname','$lastname','$email','$hashedPassword','$primary','$secondary','$photoName','$resumeName')";

    if ($conn->query($sql)) {

        /* SUCCESS POPUP + REDIRECT */
        echo "
        <script>
            alert('Registration successful! Please login to continue.');
            window.location.href = '../login.html';
        </script>
        ";
        exit;

    } else {
        echo "
        <script>
            alert('Database error. Please try again.');
            window.history.back();
        </script>
        ";
        exit;
    }

} else {
    echo "
    <script>
        alert('File upload failed. Please try again.');
        window.history.back();
    </script>
    ";
    exit;
}
?>
