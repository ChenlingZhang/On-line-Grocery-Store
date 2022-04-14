<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <!-- StyleSheet load here-->
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
        <!-- JQuery load here -->
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <!-- JS script start here -->
        <script>
            function finalShow(elements) {
                $('.map').hide();
                $('#' + elements).show();
            }
        </script>
    </head>
    <body>
        <?php
        session_start();
        if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {

            if (!empty(filter_input(INPUT_POST, "add_cart"))) {

                $cart = $_SESSION['cart'];

                $product_name = filter_input(INPUT_POST, "product_name");
                $product_price = filter_input(INPUT_POST, "product_price");
                $product_quality = filter_input(INPUT_POST, "items");
                $product_stock = filter_input(INPUT_POST, "product_stock");
                $product_id = filter_input(INPUT_POST, "product_id");

                if (empty($cart[$product_id])) {
                    $_SESSION['cart'][$product_id] = array("product_name" => $product_name, "product_price" => $product_price, "product_quality" => $product_quality, "product_stock"=>$product_stock);
                } else {
                    $_SESSION['cart'][$product_id]['product_quality'] += $product_quality;
                }
            }
            if (!empty(filter_input(INPUT_POST, "clear_cart"))) {
                session_destroy();
                header("Refresh:0");
            }
        }
        ?>
        <div class="left_container">
            <!-- Map Controller -->
            <div><img src="img/Top_Map.png" usemap="#top_map" class="root_image"></div>
            <div><img src="img/FrozenFood_Map.png" usemap="#Frozen_Food_Map" class="map hide" id="frozenfood_list"></div>
            <div><img src="img/FreshFood_Map.png" usemap="#Fresh_Food_Map" class="map hide" id="freshfood_list"></div>
            <div><img src="img/Breverages_Map.png" usemap="#Breverages_Map" class="map hide" id="breverages_list"></div>
            <div><img src="img/HomeHealth.png" usemap="#Home_Health_Map" class="map hide" id="homehealth_list"></div>
            <div><img src="img/PetFood.png" usemap="#Pet_Food_Map" class="map hide" id="petfood_list"></div>
            <!-- Root Map -->
            <map name="top_map">
                <area href="" coords="343,82,242,33" shape="rect" >
                <area href="" coords="9,176,109,220" shape="rect" onmouseover = "finalShow('frozenfood_list')">
                <area href="" coords="127,176,226,219" shape="rect" onmouseover = "finalShow('freshfood_list')">
                <area href="" coords="242,176,345,220" shape="rect" onmouseover = "finalShow('breverages_list')">
                <area href="" coords="364,177,462,220" shape="rect" onmouseover = "finalShow('homehealth_list')">
                <area href="" coords="480,177,577,220" shape="rect" onmouseover = "finalShow('petfood_list')">
            </map>
            <!-- Frozen Food Map: hide -->
            <map name="Frozen_Food_Map">
                <area alt="Hamburger" title="Hamburger" href ="index.php?id=1002" coords="7,148,99,191" shape="rect">
                <area alt="500 Fish" title="500 Fish" href="index.php?id=1000" coords="69,279,161,325" shape="rect">
                <area alt="1000 Fish" title="1000 Fish" href="index.php?id=1001" coords="175,280,266,324" shape="rect">
                <area alt="Shelled Prawns" title="Shelled Prawns" href="index.php?id=1003" coords="220,148,312,194" shape="rect">
                <area alt="1L IceCream" title="1L IceCream" href="index.php?id=1004" coords="286,279,378,323" shape="rect">
                <area alt="2L IceCream" title="2L IceCream" href="index.php?id=1005" coords="391,278,483,322" shape="rect">
            </map>
            <!-- Fresh Food Map: hide -->
            <map name="Fresh_Food_Map">
                <area target="" alt="T_bone" title="T_bone" href="index.php?id=3002" coords="7,147,80,192" shape="rect">
                <area target="" alt="500gram" title="500gram" href="index.php?id=3000" coords="40,282,130,324" shape="rect">
                <area target="" alt="1000gram" title="1000gram" href="index.php?id=3001" coords="145,280,237,324" shape="rect">
                <area target="" alt="Orange" title="Orange" href="index.php?id=3003" coords="162,146,234,191" shape="rect">
                <area target="" alt="Bananas" title="Bananas" href="index.php?id=3004" coords="241,146,312,191" shape="rect">
                <area target="" alt="Grapes" title="Grapes" href="index.php?id=3006" coords="320,146,389,190" shape="rect">
                <area target="" alt="Apple" title="Apple" href="index.php?id=3007" coords="398,147,468,189" shape="rect">
                <area target="" alt="Peaches" title="Peaches" href="index.php?id=3005" coords="473,144,546,189" shape="rect">
            </map>
            <!-- Beverages Map: hide -->
            <map name="Breverages_Map">
                <area target="" alt="200GramCoffee" title="200GramCoffee" href="index.php?id=4003" coords="23,275,95,317" shape="rect">
                <area target="" alt="500GramCoffee" title="500GramCoffee" href="index.php?id=4004" coords="104,275,175,317" shape="rect">
                <area target="" alt="25Tea" title="25Tea" href="index.php?id=4000" coords="180,273,253,318" shape="rect">
                <area target="" alt="100Tea" title="100Tea" href="index.php?id=4001" coords="259,274,331,317" shape="rect">
                <area target="" alt="200Tea" title="200Tea" href="index.php?id=4002" coords="339,274,410,319" shape="rect">
                <area target="" alt="ChocolateBar" title="ChocolateBar" href="index.php?id=4005" coords="446,153,536,195" shape="rect">
            </map>
            <!-- Home Health Map: hide -->
            <map name="Home_Health_Map">
                <area target="" alt="BathSoap" title="BathSoap" href="index.php?id=2002" coords="6,145,100,191" shape="rect">
                <area target="" alt="24Panadol" title="24Panadol" href="index.php?id=2000" coords="68,279,161,325" shape="rect">
                <area target="" alt="50Panadol" title="50Panadol" href="index.php?id=2001" coords="176,280,267,324" shape="rect">
                <area target="" alt="Washing Powder" title="Washing Powder" href="index.php?id=2005" coords="222,145,314,190" shape="rect">
                <area target="" alt="smallGarbage" title="smallGarbage" href="index.php?id=2003" coords="285,277,377,323" shape="rect">
                <area target="" alt="largeGarbage" title="largeGarbage" href="index.php?id=2004" coords="393,279,484,321" shape="rect">
                <area target="" alt="Laundry" title="Laundry" href="index.php?id=2006" coords="436,146,529,189" shape="rect">
            </map>
            <!-- Pet Food Map: hide -->
            <map name="Pet_Food_Map">
                <area target="" alt="BirdFood" title="BirdFood" href="index.php?id=5002" coords="117,146,208,192" shape="rect">
                <area target="" alt="CatFood" title="CatFood" href="index.php?id=5003" coords="223,148,315,192" shape="rect">
                <area target="" alt="1kgDryDogFood" title="1kgDryDogFood" href="index.php?id=5001" coords="287,280,380,324" shape="rect">
                <area target="" alt="5kgDryDogFood" title="5kgDryDogFood" href="index.php?id=5001" coords="394,280,487,324" shape="rect">
                <area target="" alt="FishFood" title="FishFood" href="index.php?id=5004" coords="438,147,528,190" shape="rect">
            </map>


        </div>
        <div class="right_top_container">
            <?php
            $connection = mysqli_connect("127.0.0.1", "uts", "internet", "assignment1");
            if (!$connection) {
                die("Connect Error Message: " . mysqli_connect_error());
            }
            $product_id = $_GET['id'];
            $query = "select product_name, unit_price, unit_quantity, in_stock from products where product_id = " . $product_id . ";";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_row($result);
            $product_name = $row[0];
            $product_price = $row[1];
            $product_quality = $row[2];
            $product_stock = $row[3];

            echo "<p id='product_details'> Product Details:</p></br>";
            echo " <table align='center' border=0 width='60%'>";
            echo "<tr><td>Product Name:</td><td>" . $product_name . "</td></tr>";
            echo "<tr><td>Product Price:</td><td>" . $product_price . "</td></tr>";
            echo "<tr><td>Quality:</td><td>" . $product_quality . "</td></tr>";
            echo "<tr><td>stock:</td><td>" . $product_stock . "</td></tr></table>";

            if (!empty($_SESSION['cart'][$product_id])) {
                $product_stock = $product_stock - $_SESSION['cart'][$product_id]['product_quality'];
            }
            echo "<form action=\"index.php\" method=\"POST\">";
            if ($product_stock <= 0) {
                echo "<p align='center' id='quality_doc'>Quality add: <input type='number' readonly='readonly' name='items' value='0'/></p>";
            } else {
                echo "<p align='center' id='quality_doc'>Quality add: <input type='number' name='items' value='1' oninput='if(value>" . $product_stock . ")value=" . $product_stock . ";if(value<1)value=1'/></p>";
            }
            echo "<input name=\"product_name\" type=\"hidden\" value=\"" . $product_name . "\" />";
            echo "<input name=\"product_price\" type=\"hidden\" value=\"" . $product_price . "\" />";
            echo "<input name=\"product_quality\" type=\"hidden\" value=\"" . $product_quality . "\" />";
            echo "<input name=\"product_stock\" type=\"hidden\" value=\"" . $product_stock . "\" />";
            echo "<input name=\"product_id\" type=\"hidden\" value=\"" . $product_id . "\" />";
            echo "<p align='center'><input type='submit' value='Add to Cart' name='add_cart'></p>";
            echo "</form>";

            mysqli_close($connection);
            ?>
        </div>

        <div class="right_bottom_container">

            <p id='product_details'> Shopping Cart </p>
            <table  border="0" align='center'>
                <tr>
                    <td align="right" valign="middle">
                        <form action='index.php' method='post'>
                            <input  type='submit' value='Clear' name='clear_cart'>
                        </form>
                    </td>
                    <td align="left" valign="middle">
                        <form action='ChenkOut.php' method='post'>
                            <input  type='submit' value='Checkout' name='checkout'>
                        </form>
                    </td>
                </tr>
            </table>
            <table width="60%" border="1" align='center'>
                <tr>
                    <td>Product Name</td>
                    <td>Product Price</td>
                    <td>Product Quality</td>
                     <td>Price</td>
                </tr>

                <?php
                $cart = $_SESSION['cart'];
                $total_price = 0;
                if ($cart == NULL){
                    echo "<p style='text-align: center'>Your Shopping cart is empty!!!</p>";
                }
                else {
                    foreach ($cart as $Key => $droduct) {
                        echo "<tr>";
                        foreach ($droduct as $Key => $value) {

                            if ($Key != 'product_stock') {
                                echo "<td id='$Key'>" . $value . "</td>";
                            }

                        }
                        echo "<td>" . $droduct["product_price"] * $droduct['product_quality'] . "</td></tr>";
                        $total_price += $droduct["product_price"] * $droduct['product_quality'];
                    }
                }
                    echo "<tr><td colspan='4' align='right'>Total Price: " . $total_price."</td></tr></table>";
                    ?>
        </div>
    </body>
</html>
