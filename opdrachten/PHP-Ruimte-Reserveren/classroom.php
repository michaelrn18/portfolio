<?php
  require 'server.php';

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokaal</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/material-dashboard.min.css">
</head>
<body class="bg-dark">
    <main class="classroom-container">
    
        <div class="clock" id="clock"></div>
        <div class="reservations">
    <div class="col-lg-6 col-md-12">
        <div class="card bg-dark text-light">
        <div class="card-header card-header-warning">
            <h4 class="card-title">Reservaties</h4>
            <p class="card-category">alle ingeplande reservaties</p>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover-dark">
                <thead class="text-warning">
                    <tr>
                        <th>Datum</th>
                        <th>Start tijd</th>
                        <th>Eind tijd</th>
                        <th>Lokaal</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM reservaties"; 
                            $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                            while ($row = $result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td class='text-light'>" . $row['date'] . "</td>";
                                echo "<td class='text-light'>" . $row['time_start'] . "</td>";
                                echo "<td class='text-light'>" . $row['time_end'] . "</td>";
                                echo "<td class='text-light'>" . $row['lokaal'] . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </main>
    <script src="./js/jQuery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#clock").load("classroom_clock.php");
            setInterval(() => {
                $("#clock").load("classroom_clock.php");
            }, 1000);
        });
    </script>
</body>
</html>