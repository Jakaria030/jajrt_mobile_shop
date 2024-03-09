<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
    <title>JAJRT Mobile Shop - Mobile</title>
</head>
<body class="bg-light">
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>
    
    <!-- Description of mobile start -->
    <?php 
        if(isset($_GET["description"])){
            $f_data = filteration($_GET);
            $product_res = crud("select", "SELECT * FROM `products` WHERE `p_id`=?", [$f_data["p_id"]], "i");
            $row = $product_res->fetch_assoc();
            $path = MOBILE_IMG_PATH;
        }
    ?>
    <div class="my-5 px-4"> 
        <h2 class="fw-bold h-font text-center">DESCRIPTION OF THE MOBILE</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row"> 
            <div class="col-lg-4 col-md-12">
                <div> 
                    <?php 
                        echo<<<data
                        <img src='$path$row[b_profile]' class='d-block w-100 border border-secondary rounded'>
                        data;
                    ?>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 mt-md-4 mt-lg-0"> 
                <div class="d-flex justify-content-between ms-lg-5"> 
                    <div>
                        <h2><?php echo $row["mobile_name"]; ?></h2>
                        <p><?php echo $row["small_description"]?></p>
                    </div>
                    <div>
                        <?php 
                            echo<<<data
                            <h4>Price: <span>৳$row[b_price]</span></h4>
                            data;
                        ?>
                    </div>
                </div>
                <div class="ms-lg-5">
                    <p style="text-align: justify" class="mt-4"><?php echo $row["description"]?></p>

                    <p>Warranty: <b><?php echo $row["warranty"]?></b></p>
                </div>
                <div class="d-block ms-lg-5">
                    <button type="submit" class="btn btn-primary shadow-none d-block w-100"><i class="bi bi-cart-plus-fill text-lg"></i> Add To Cart</button>
                </div>

            </div>
        </div>

        <div class="mt-5">
            <h2>Description</h2> 

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Physical Specification</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Build</th>
                            <td><?php echo $row["p_build"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Weight</th>
                            <td><?php echo $row["p_weight"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Dimensions</th>
                            <td><?php echo $row["p_dimensions"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Network</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">SIM</th>
                            <td><?php echo $row["n_sim"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Speed</th>
                            <td><?php echo $row["n_speed"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">2G bands</th>
                            <td><?php echo $row["n_2g_bands"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">3G bands</th>
                            <td><?php echo $row["n_3g_bands"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">4G bands</th>
                            <td><?php echo $row["n_4g_bands"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">5G bands</th>
                            <td><?php echo $row["n_5g_bands"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Display</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Size</th>
                            <td><?php echo $row["d_size"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Type</th>
                            <td><?php echo $row["d_type"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Resolution</th>
                            <td><?php echo $row["d_resolution"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Processor</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">CPU</th>
                            <td><?php echo $row["p_cpu"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">GPU</th>
                            <td><?php echo $row["p_gpu"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Chipset</th>
                            <td><?php echo $row["p_chipset"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Memory</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Internal</th>
                            <td><?php echo $row["m_internal"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Card slot</th>
                            <td><?php echo $row["m_card_slot"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Main Camera</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Video</th>
                            <td><?php echo $row["m_video"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Triple</th>
                            <td><?php echo $row["m_triple"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Features</th>
                            <td><?php echo $row["m_features"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Selfie Camera</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Video</th>
                            <td><?php echo $row["s_video"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Single</th>
                            <td><?php echo $row["s_single"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Features</th>
                            <td><?php echo $row["s_features"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">OS</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Operating System</th>
                            <td><?php echo $row["o_os"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Connectivity</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">NFC</th>
                            <td><?php echo $row["c_nfc"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">USB</th>
                            <td><?php echo $row["c_usb"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Radio</th>
                            <td><?php echo $row["c_radio"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Wi-Fi</th>
                            <td><?php echo $row["c_wifi"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Bluetooth</th>
                            <td><?php echo $row["c_bluetooth"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">3.5mm Jack</th>
                            <td><?php echo $row["c_jack"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Features</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Sensors</th>
                            <td><?php echo $row["f_sensors"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Battery</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Type</th>
                            <td><?php echo $row["b_type"]; ?></td>
                        </tr>
                        <tr>
                            <th style="width:20%;">Charging</th>
                            <td><?php echo $row["b_charging"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3"> 
                <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Test</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:20%;">Performance</th>
                            <td><?php echo $row["t_performance"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <!-- /Description of mobile end -->

    <!-- Footer -->
    <?php require("inc/footer.php"); ?>

</body>
</html>