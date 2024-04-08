<?php
include_once '../settings/core.php';
include_once '../functions/getprofile.php';
include_once '../settings/connection.php';
$profilePictureUrl = getProfilePicture($_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/profile.css" />

    <meta charset="UTF-8" />
    <title>User Profile</title>
</head>

<body>
    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3">
                            <img src='<?php echo $profilePictureUrl; ?>' alt='Profile Picture' width='130'
                                class='rounded mb-2 img-thumbnail'>
                            <form id="profilePictureForm" action="../actions/upload_profile_picture.php" method="post"
                                enctype="multipart/form-data" style="display: none;">
                                <input type="file" name="profile_picture" accept="image/*">
                                <button type="submit" class="btn btn-outline-dark btn-sm btn-block">Upload</button>
                            </form>
                            <button id="editProfileButton" class="btn btn-outline-dark btn-sm btn-block">Edit
                                profile picture</button>
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0">
                                <?php
                                //Getting the user's email from the session
                                include_once '../settings/connection.php';
                                $email = $_SESSION['email'];
                                include_once '../functions/display_name_fxn.php';
                                echo display_name($email);
                                ?>
                            </h4>
                            <p class="small mb-4">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block"></h5><small class="text-muted"> <i
                                    class="fas fa-image mr-1"></i></small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block"></h5><small class="text-muted"> <i
                                    class="fas fa-user mr-1"></i></small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block"></h5><small class="text-muted"> <i
                                    class="fas fa-user mr-1"></i></small>
                        </li>
                    </ul>
                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-0">Information</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <p class="font-italic mb-0">
                            <?php
                            include_once '../functions/display_email_fxn.php';
                            echo display_email($email);
                            ?>
                        </p>
                        <p class="font-italic mb-0">
                            <?php
                            include_once '../functions/display_number_fxn.php';
                            echo display_number($email);
                            ?>
                        </p>
                        <p class="font-italic mb-0">Managing Books</p>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Recent books</h5><a href="../admin/storybooks_view.php"
                            class="btn-manage ">Manage books here</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-2 pr-lg-1">
                            <?php
                            include_once '../functions/display_images_fxn.php';
                            echo display_images($email);
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("editProfileButton").addEventListener("click", function () {
            // Toggle visibility of the profile picture upload form
            var profilePictureForm = document.getElementById("profilePictureForm");
            if (profilePictureForm.style.display === "none") {
                profilePictureForm.style.display = "block";
            } else {
                profilePictureForm.style.display = "none";
            }
        });
    </script>

</body>

</html>