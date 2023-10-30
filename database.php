<html>

<body>
    <button onclick="filterTableByRegion('Bristol')" class="btn btn-dark">Bristol</button>
    <button onclick="filterTableByRegion('Bath')" class="btn btn-dark">Bath</button>
    <button onclick="filterTableByRegion('North Somerset')" class="btn btn-dark">North Somerset</button>
    <button onclick="filterTableByRegion('South Gloucestershire')" class="btn btn-dark">South Gloucestershire</button>
    <table class="table table-striped table-dark">
        <!-- <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Description</th>
            <th>Phone</th>
            <th>Services</th>
            <th>Region</th>
        </tr> -->

        <!--Database connection-->
        <?php
        $conn = mysqli_connect("localhost", "root", "", "cycle_shop");
        if ($conn->connect_error) {
            die("connection failed:" . $conn->connect_error);
        }

        // Requested columns from database
        $sql = "SELECT NAME, ADDRESS, DESCRIPTION, WEBSITE, PHONE, SERVICES_PROVIDED, REGION FROM CYCLE_SHOPS";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-dark' id='cycleShopsTable'>";
            echo "<tr><th>Name</th><th>Address</th><th>Description</th><th>Phone</th><th>Services</th><th>Region</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td><a href='" . $row["WEBSITE"] . "' target='_blank'>" . $row["NAME"] . "</a></td>
                <td>" . $row["ADDRESS"] . "</td>
                <td>" . $row["DESCRIPTION"] . "</td>
                <td>" . $row["PHONE"] . "</td>
                <td>" . $row["SERVICES_PROVIDED"] . "</td>
                <td>" . $row["REGION"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>

    <script>
        function filterTableByRegion(region) {
            var table = document.getElementById("cycleShopsTable");
            var tr = table.getElementsByTagName("tr");

            for (var i = 1; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName("td")[5]; // 5 is the index of the Region column
                if (td) {
                    if (td.innerHTML.toUpperCase() === region.toUpperCase()) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>