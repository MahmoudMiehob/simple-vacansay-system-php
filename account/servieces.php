<?php
ob_start();
include '../database/dbconnect.php';
include 'role.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

//check if the user is already login
if (!isset($_SESSION['user_id']) || $role != 1) {
  header("Location: login.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>services</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
  <nav class="navbar navbar-light bg-light p-3" style="border-bottom: 2px blue solid;">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
      <a class="navbar-brand" href="#">
        syrian jops
      </a>
      <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
        data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">

      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
          aria-expanded="false">
          Settings
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="../index.php">website</a></li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="dashboard.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="ml-2">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="services.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-shopping-cart">
                  <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="ml-2">services</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span class="ml-2">Users</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">

        <h1 class="h2">services</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add new services
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new services</h5>
              </div>
              <div class="modal-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Service Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="image">Service Image:</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                  </div>
                  <div class="form-group">
                    <label for="description">Service Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="salary">salary:</label>
                    <input type="text" class="form-control" id="salary" name="salary" required></input>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary" name="submit">Add Service</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </form>

                <?php
                if (isset($_POST['submit'])) {
                  // Get form data
                  $name = $_POST['name'];
                  $description = $_POST['description'];
                  $salary = $_POST['salary'];
                
                  // Get image data
                  $image = $_FILES['image'];
                  $image_name = $image['name'];
                  $image_tmp = $image['tmp_name'];
                  $image_size = $image['size'];
                  $image_type = $image['type'];
                
                  // Check if image is valid
                  if ($image_size > 0 && $image_type == 'image/jpeg' || $image_type == 'image/png') {
                    // Upload image
                    $upload_path = "../img/servieces/" . $image_name;
                    if (move_uploaded_file($image_tmp, $upload_path)) {
                      // Insert data into database
                      $sql = "INSERT INTO services (name, image, description ,salary) VALUES (?, ?, ?, ?)";
                      $stmt = $conn->prepare($sql);
                      $stmt->bind_param("ssss", $name, $image_name, $description, $salary);
                      if ($stmt->execute()) {
                        echo "Service added successfully!";
                                
                        // Set Mailtrap SMTP credentials
                        $mailtrap_username = 'adee31e060165b';
                        $mailtrap_password = '44a8ff1899f0d0';
                
                        // Set email details
                        $from_email = 'ahmadfourthyear@gmail.com';
                        $subject = 'New service added!';
                        $body = 'A new service has been added: ' . $name . '. Check it out!';
                
                        // Create a new PHPMailer instance
                        $mail = new PHPMailer(true);
                
                        // Set Mailtrap SMTP settings
                        $mail->isSMTP();
                        $mail->Host = 'sandbox.smtp.mailtrap.io';
                        $mail->SMTPAuth = true;
                        $mail->Username = $mailtrap_username;
                        $mail->Password = $mailtrap_password;
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 587;
                
                        // Set email headers
                        $mail->setFrom($from_email);
                        $mail->Subject = $subject;
                        $mail->Body = $body;
                
                        // Get all subscribed users
                        $sql = "SELECT email FROM users WHERE subscribe = 1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $to_email = $row['email'];
                            $mail->addAddress($to_email);
                          }
                        }
                
                        // Send the email
                        if (!$mail->send()) {
                          echo 'Error sending email: ' . $mail->ErrorInfo;
                        } else {
                          echo 'Email sent successfully to all subscribed users!';
                        }
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                    } else {
                      echo "Error uploading image!";
                    }
                  } else {
                    echo "Invalid image!";
                  }
                }

                ?>
              </div>
            </div>
          </div>
        </div>

        <?php
        $sql = "SELECT * FROM services";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) { // check if there are results or not
          $services = $result->fetch_all(MYSQLI_ASSOC);
          ?>
          <table class="table table-primary table-striped table-bordered">
            <thead class="table-dark">
              <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">image</th>
                <th scope="col">description</th>
                <th scope="col">salary</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // table data
              if ($services != null) {
                foreach ($services as $service) { ?>
                  <tr>
                    <th scope="row"><?= $service['id'] ?></th>
                    <td><?= $service['name'] ?></td>
                    <td><img src="<?php echo "../img/servieces/" . $service['image'] ?>" width="30px" height="30px" alt="">
                    </td>
                    <td class="descriptionrow"><button class="btn btn-sm btn-info" data-toggle="modal"
                        data-target="#descriptionModal<?= $service['id'] ?>">View description</button></td>
                    <!-- Modal window -->
                    <div class="modal fade" id="descriptionModal<?= $service['id'] ?>" tabindex="-1" role="dialog"
                      aria-labelledby="descriptionModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="descriptionModalLabel">Description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body"><?= $service['description'] ?></div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <td><?= $service['salary'] ?></td>
                    <td class="text-center">
                      <button class="btn btn-primary" data-toggle="modal"
                        data-target="#editModal<?= $service['id'] ?>">edit</button>
                      <button class="btn btn-danger" data-toggle="modal"
                        data-target="#deleteModal<?= $service['id'] ?>">delete</button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php } ?>
        </main>
      </div>
    </div>


    <!-- edit Modal -->
    <?php foreach ($services as $service) { ?>
      <div class="modal fade" id="editModal<?= $service['id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="edit_service.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="editservice_id" value="<?= $service['id'] ?>">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="editname" name="editname" value="<?= $service['name'] ?>">
                </div>
                <div class="form-group">
                  <label for="image">Image:</label>
                  <input type="file" class="form-control" id="editimage" name="editimage"
                    value="../img/servieces/<?= $service['image'] ?>">
                  <img src="<?php echo "../img/servieces/" . $service['image'] ?>" width="30px" height="30px" alt="">
                </div>
                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea class="form-control" id="editdescription"
                    name="editdescription"><?= $service['description'] ?></textarea>
                </div>
                <div class="form-group">
                  <label for="description">Salary:</label>
                  <input type="text" class="form-control" value="<?= $service['salary'] ?>" id="editsalary"
                    name="editsalary">
                </div>
                <button type="submit" name="editservice_id" value="<?= $service["id"] ?>" class="btn btn-primary">Save
                  changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <!-- delete Modal -->
    <?php
    if ($services !== null) {
      foreach ($services as $service) { ?>
        <div class="modal fade" id="deleteModal<?= $service['id'] ?>" tabindex="-1" role="dialog"
          aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete service <?= $service['name'] ?>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="delete_service.php" method="post">
                  <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php }
    }
        } ?>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>