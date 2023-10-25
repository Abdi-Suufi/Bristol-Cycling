<html>
<body>
    <table class="table table-striped table-dark">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Description</th>
            <th>Website</th>
            <th>Phone</th>
            <th>Services</th>
            <th>Region</th>
        </tr>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "cycle_shop");
        if ($conn->connect_error) {
            die("connection failed:" . $conn->connect_error);
        }
        $sql = "SELECT NAME, ADDRESS, DESCRIPTION, WEBSITE, PHONE, SERVICES_PROVIDED, REGION FROM CYCLE_SHOPS";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["NAME"] . "</td><td>" . $row["ADDRESS"] . "</td><td>" . $row["DESCRIPTION"] . "</td> <td>" . $row["WEBSITE"] . "</td> <td>" . $row["PHONE"] . "</td> <td>" . $row["SERVICES_PROVIDED"] . "</td> <td>" . $row["REGION"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 result";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>