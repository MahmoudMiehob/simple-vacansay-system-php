<?php
ob_start();
include 'database/dbconnect.php';
?>

<div class="container-fluid bg-primary text-secondary p-5">
    <div class="row g-5">
        <div class="col-12 text-center">
            <h1 class="display-5 mb-4">Stay Update!!!</h1>
            <form class="mx-auto" style="max-width: 600px;" method="post">
                <div class="input-group">
                    <input type="email" class="form-control border-white p-3" placeholder="Your Email" name="email">
                    <button class="btn btn-dark px-4" type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Check if email exists in users table
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Check if email is already subscribed
        $row = $result->fetch_assoc();
        if ($row['subscribe'] == 1) {
            $message = "You are already subscribed!";
            $alert_class = "alert-info";
        } else {
            // Update subscribe column to 1
            $query = "UPDATE users SET subscribe = 1 WHERE email = '$email'";
            $conn->query($query);
            $message = "Thank you for subscribing!";
            $alert_class = "alert-success";
        }
    } else {
        $message = "Please register on our website to subscribe.";
        $alert_class = "alert-danger";
    }
}
?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subscription Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert <?php echo $alert_class ?? ''; ?>" role="alert">
                    <?php echo $message ?? ''; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<!-- Trigger the modal only when form is submitted -->
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <script>
        $(document).ready(function() {
                $('#myModal').modal('show');
        });
    </script>
<?php } ?>