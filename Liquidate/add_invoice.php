<?php
include("session.php");

// Handle form submission for adding a new invoice
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform necessary form validation and processing

    $invoiceDate = $_POST['invoice_date']; // Assuming you have a form field named 'invoice_date'
    $amount = $_POST['amount']; // Assuming you have a form field named 'amount'
    $description = $_POST['description']; // Assuming you have a form field named 'description'

    // Perform SQL insertion to add the new invoice
    $insertQuery = "INSERT INTO invoiceexpenses (user, expenseDate,  Description, expenses) VALUES ('$userid', '$invoiceDate',  '$description', '$amount')";
    $result = mysqli_query($con, $insertQuery);

    if ($result) {
        // Invoice added successfully, you can redirect or display a success message
        header("Location: add_invoice.php");
        exit();
    } else {
        // Handle error, you can redirect or display an error message
        echo "Error: " . mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Expense Manager - Add Invoice</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="120">
                <h5><?php echo $username ?></h5>
                <p><?php echo $useremail ?></p>
            </div>
            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span> Dashboard</a>
                <a href="add_expense.php" class="list-group-item list-group-item-action "><span data-feather="plus-square"></span> Add Expenses</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="dollar-sign"></span> Manage Expenses</a>
            </div>
            <div class="sidebar-heading">Settings </div>
            <div class="list-group list-group-flush">
                <a href="profile.php" class="list-group-item list-group-item-action "><span data-feather="user"></span> Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span> Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
                <!-- Navbar content similar to your existing code -->
            </nav>

            <div class="container-fluid">
                <h3 class="mt-4 text-center">Add Invoice</h3>
                <hr>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!-- Form for adding a new invoice -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="invoice_date">Invoice Date:</label>
                                <input type="date" class="form-control" id="invoice_date" name="invoice_date" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="text" class="form-control" id="amount" name="amount" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Invoice</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and custom scripts similar to your existing code -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace()
    </script>
</body>

</html>
