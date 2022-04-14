<html>
    <head>
        <meta charset="utf-8">
        <title>check out</title>
        <style>
            .error {
                width: 200px;
                height: 30px;color: #FF0000;}
            </style>
        </head>
        <body>
            <?php
            if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
                session_start();
                $cart = $_SESSION['cart'];
               
                    $total_price = 0;

                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<td colspan='3' align='center'>Shopping List</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Product Name</td>";
                    echo "<td>Product Price</td>";
                    echo "<td>Product Quality</td>";
                    echo "</tr>";

                    foreach ($cart as $Key => $droduct) {
                        echo "<tr>";
                        foreach ($droduct as $Key => $value) {
                            if ($Key != 'product_stock') {
                                echo "<td id='$Key'>" . $value . "</td>";
                            }
                        }
                        echo "</tr>";
                        $total_price += $droduct["product_price"] * $droduct['product_quality'];
                    }
                    echo "<td colspan='3' align='right'>Total Price:" . $total_price . "</td></table>";
                    if (empty($cart)) {
                        echo "<script>alert('no products')</script>";
                        echo "<script>setTimeout(function(){window.location.href='index.php';},3000);</script> "; 
                    }
                
                if (!empty(filter_input(INPUT_POST, "purchase"))) {
                    $verify = true;
                    if (empty(filter_input(INPUT_POST, "name"))) {
                        $nameErr = "name cannot be empty!";
                        $verify = false;
                    } else {
                        $name = filter_input(INPUT_POST, "name");
                    }
                    if (empty(filter_input(INPUT_POST, "address"))) {
                        $addressErr = "address cannot be empty!";
                        $verify = false;
                    } else {
                        $address = filter_input(INPUT_POST, "address");
                    }
                    if (empty(filter_input(INPUT_POST, "suburb"))) {
                        $suburbErr = "suburb cannot be empty!";
                        $verify = false;
                    } else {
                        $suburb = filter_input(INPUT_POST, "suburb");
                    }
                    if (empty(filter_input(INPUT_POST, "state"))) {
                        $stateErr = "state cannot be empty!";
                        $verify = false;
                    } else {
                        $state = filter_input(INPUT_POST, "state");
                    }
                    if (empty(filter_input(INPUT_POST, "country"))) {
                        $countryErr = "country cannot be empty!";
                        $verify = false;
                    } else {
                        $country = filter_input(INPUT_POST, "country");
                    }
                    if (empty(filter_input(INPUT_POST, "email"))) {
                        $emailErr = "email cannot be empty!";
                        $verify = false;
                    } else {
                        $email = filter_input(INPUT_POST, "email");
                    }
                    if ($verify) {
                        $connection = mysqli_connect("localhost", "uts", "internet", "assignment1");
                        if (mysqli_connect_errno()) {
                            die("Connect Error Message: " . mysqli_connect_error());
                        }
                        foreach ($cart as $Key => $droduct) {
                            $sql = "update products set in_stock=" . ($droduct["product_stock"] - $droduct["product_quality"]) . " where product_id=" . $Key . ";";
                         
                            $retval = mysqli_query($connection, $sql);
                            if (!$retval) {
                                die(mysqli_error($connection));
                            }
                        }
                        mysqli_close($connection);
                        session_destroy();
                        echo '<script>alert("Checkout Success!!!")</script>';
                        echo "<script>setTimeout(function(){window.location.href='index.php';},3000);</script> "; 
                    }
                }
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
                name:<input type="text" name="name" value="<?php echo $name; ?>"/><span class="error">* <?php echo $nameErr; ?></span><br>
                address:<input type="text" name="address"  value="<?php echo $address; ?>"/><span class="error">* <?php echo $addressErr; ?></span><br>
                suburb:<input type="text" name="suburb" value="<?php echo $suburb; ?>"/><span class="error">* <?php echo $suburbErr; ?></span><br>
                state:<input type="text" name="state" value="<?php echo $state; ?>"/><span class="error">* <?php echo $stateErr; ?></span><br>
                country:<input type="text" name="country" value="<?php echo $country; ?>"/><span class="error">* <?php echo $countryErr; ?></span><br>
                email:<input type="text" name="email" value="<?php echo $email; ?>"/><span class="error">* <?php echo $emailErr; ?></span><br>
                <input name= "purchase" type="submit" value="Purchase" />
            </form>
    </body>

