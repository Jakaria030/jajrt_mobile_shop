<?php 
    require("inc/db_config.php");
    require("inc/essentials.php");
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Product</title>
    <!-- Link files -->
    <?php require("inc/links.php"); ?>
</head>
<body>
    
    <!-- Header -->
    <?php require("inc/header.php"); ?>

    <!-- Carousel body start -->
    <div class="container-fluid" id="main-content"> 
        <div class="row"> 
            <div class="col-lg-10 ms-auto p-4 overflow-hidden"> 
                <h3 class="mb-4">Add Product</h3>

                <form id="product_s_form">
                    <div class="mt-5">

                        <!-- Basic Information -->
                        <div class="mt-3"> 
                            <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Basic Information of product</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:20%;">Mobile Name</th>
                                        <td>
                                            <select class="form-control shadow-none" id="mobile_name" name="mobile_name">
                                            <?php
                                                $res = selectAll("categories");
                                                while($row = $res->fetch_assoc()){
                                                    $m_name  = $row['mobile_name'];
                                                    echo "<option value='$m_name'>$m_name</option>";
                                                }
                                            ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Model</th>
                                        <td><input type="text" id="b_model" name="b_model" class="form-control shadow-none" placeholder="iPhone-15" required></td>
                                    </tr>
                                    <tr> 
                                        <th style="width:20%;">Quantity</th>
                                        <td><input type="number" min="1" id="b_quantity" name="b_quantity" class="form-control shadow-none" placeholder="500" required></td>
                                    </tr>
                                    <tr> 
                                        <th style="width:20%;">Price</th>
                                        <td><input type="number" min="1" id="b_price" name="b_price" class="form-control shadow-none" placeholder="100000" required></td>
                                    </tr>
                                    <tr> 
                                        <th style="width:20%;">Image</th>
                                        <td><input type="file" id="b_profile" name="b_profile" class="form-control shadow-none" accept=".jpg, .png, .jpeg, .webp" required></td>
                                    </tr>
                                    <tr> 
                                        <th style="width:20%;">Small Description</th>
                                        <td><input type="text" id="small_description" name="small_description" class="form-control shadow-none" placeholder="Volcanic Black | 8/128GB | USA" required></td>
                                    </tr>
                                    <tr> 
                                        <th style="width:20%;">Description</th>
                                        <td><input type="text" id="description" name="description" class="form-control shadow-none" placeholder="OnePlus 10 Pro boasts a flagship Snapdragon 8 Gen 1 processor, a smooth 120Hz AMOLED display" required></td>
                                    </tr>
                                    <tr> 
                                        <th style="width:20%;">Warranty</th>
                                        <td><input type="text" id="warranty" name="warranty" class="form-control shadow-none" placeholder="10 Days Replacement & 2 Years Service Warranty" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Description of mobile start -->
                        <div class="mt-3"> 
                            <h4 class="p-2 rounded" style="background-color: #0d6efd30; ">Physical Specification</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:20%;">Build</th>
                                        <td><input type="text" id="p_build" name="p_build" class="form-control shadow-none" placeholder="Glass front (Corning-made glass), glass back (Corning-made glass), titanium frame (grade 5)" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Weight</th>
                                        <td><input type="text" id="p_weight" name="p_weight" class="form-control shadow-none" placeholder="221 g (7.80 oz)" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Dimensions</th>
                                        <td><input type="text" id="p_dimensions" name="p_dimensions" class="form-control shadow-none" placeholder="159.9 x 76.7 x 8.3 mm (6.30 x 3.02 x 0.33 in)" required></td>
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
                                        <td><input type="text" id="n_sim" name="n_sim" class="form-control shadow-none" placeholder="Nano-SIM and eSIM - International Dual eSIM with multiple numbers - USA Dual SIM (Nano-SIM, dual stand-by)" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Speed</th>
                                        <td><input type="text" id="n_speed" name="n_speed" class="form-control shadow-none" placeholder="HSPA, LTE-A, 5G, EV-DO Rev.A 3.1 Mbps" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">2G bands</th>
                                        <td><input type="text" id="n_2g_bands" name="n_2g_bands" class="form-control shadow-none" placeholder="GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (dual-SIM) CDMA 800 / 1900" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">3G bands</th>
                                        <td><input type="text" id="n_3g_bands" name="n_3g_bands" class="form-control shadow-none" placeholder="HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 CDMA2000 1xEV-DO" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">4G bands</th>
                                        <td><input type="text" id="n_4g_bands" name="n_4g_bands" class="form-control shadow-none" placeholder="1, 2, 3, 4, 5, 7, 8, 12, 13, 17, 18, 19, 20, 25, 26, 28, 30, 32, 34, 38, 39, 40, 41, 42, 46, 48, 53, 66 - A3106" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">5G bands</th>
                                        <td><input type="text" id="n_5g_bands" name="n_5g_bands" class="form-control shadow-none" placeholder="1, 2, 3, 5, 7, 8, 12, 20, 25, 26, 28, 30, 38, 40, 41, 48, 53, 66, 70, 77, 78, 79 SA/NSA/Sub6 - A3106" required></td>
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
                                        <td><input type="text" id="d_size" name="d_size" class="form-control shadow-none" placeholder="6.7 inches, 110.2 cm2 (~89.8% screen-to-body ratio)" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Type</th>
                                        <td><input type="text" id="d_type" name="d_type" class="form-control shadow-none" placeholder="LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Resolution</th>
                                        <td><input type="text" id="d_resolution" name="d_resolution" class="form-control shadow-none" placeholder="1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)" required></td>
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
                                        <td><input type="text" id="p_cpu" name="p_cpu" class="form-control shadow-none" placeholder="Hexa-core (2x3.78 GHz + 4x2.11 GHz)" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">GPU</th>
                                        <td><input type="text" id="p_gpu" name="p_gpu" class="form-control shadow-none" placeholder="Apple GPU (6-core graphics)" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Chipset</th>
                                        <td><input type="text" id="p_chipset" name="p_chipset" class="form-control shadow-none" placeholder="Apple A17 Pro (3 nm)" required></td>
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
                                        <td><input type="text" id="m_internal" name="m_internal" class="form-control shadow-none" placeholder="256GB 8GB RAM, 512GB 8GB RAM, 1TB 8GB RAM NVMe" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Card slot</th>
                                        <td><input type="text" id="m_card_slot" name="m_card_slot" class="form-control shadow-none" placeholder="No" required></td>
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
                                        <td><input type="text" id="m_video" name="m_video" class="form-control shadow-none" placeholder="4K@24/25/30/60fps, 1080p@25/30/60/120/240fps, 10-bit HDR, Dolby Vision HDR (up to 60fps), ProRes" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Triple</th>
                                        <td><input type="text" id="m_triple" name="m_triple" class="form-control shadow-none" placeholder='48 MP, f/1.8, 24mm (wide), 1/1.28", 1.22µm, dual pixel PDAF, sensor-shift OIS 12 MP' required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Features</th>
                                        <td><input type="text" id="m_features" name="m_features" class="form-control shadow-none" placeholder="Dual-LED dual-tone flash, HDR (photo/panorama)" required></td>
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
                                        <td><input type="text" id="s_video" name="s_video" class="form-control shadow-none" placeholder="4K@24/25/30/60fps, 1080p@25/30/60/120fps, gyro-EIS" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Single</th>
                                        <td><input type="text" id="s_single" name="s_single" class="form-control shadow-none" placeholder='12 MP, f/1.9, 23mm (wide), 1/3.6", PDAF, OIS SL 3D, (depth/biometrics sensor)' required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Features</th>
                                        <td><input type="text" id="s_features" name="s_features" class="form-control shadow-none" placeholder="HDR, Cinematic mode (4K@24/30fps)" required></td>
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
                                        <td><input type="text" id="os" name="o_os" class="form-control shadow-none" placeholder="iOS 17, upgradable to iOS 17.0.3" required></td>
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
                                        <td><input type="text" id="c_nfc" name="c_nfc" class="form-control shadow-none" placeholder="YES" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">USB</th>
                                        <td><input type="text" id="c_usb" name="c_usb" class="form-control shadow-none" placeholder="USB Type-C 3.2 Gen 2, DisplayPort" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Radio</th>
                                        <td><input type="text" id="c_radio" name="c_radio" class="form-control shadow-none" placeholder="No" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Wi-Fi</th>
                                        <td><input type="text" id="c_wifi" name="c_wifi" class="form-control shadow-none" placeholder="Wi-Fi 802.11 a/b/g/n/ac/6e, dual-band, hotspot" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Bluetooth</th>
                                        <td><input type="text" id="c_bluetooth" name="c_bluetooth" class="form-control shadow-none" placeholder="5.3, A2DP, LE" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">3.5mm Jack</th>
                                        <td><input type="text" id="c_jack" name="c_jack" class="form-control shadow-none" placeholder="No" required></td>
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
                                        <td><input type="text" id="f_sensors" name="f_sensors" class="form-control shadow-none" placeholder="Face ID, accelerometer, gyro, proximity, compass, barometer Ultra Wideband 2 (UWB) support Emergency SOS via satellite (SMS sending/receiving)" required></td>
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
                                        <td><input type="text" id="b_type" name="b_type" class="form-control shadow-none" placeholder="Li-Ion 4441 mAh, non-removable" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:20%;">Charging</th>
                                        <td><input type="text" id="b_charging" name="b_charging" class="form-control shadow-none" placeholder="Wired, PD2.0, 50% in 30 min (advertised) 15W wireless (MagSafe) 7.5W wireless (Qi) 4.5W reverse wired" required></td>
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
                                        <td><input type="text" id="t_performance" name="t_performance" class="form-control shadow-none" placeholder="AnTuTu: 1487203 (v10) GeekBench: 7237 (v6.0)" required></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Description of mobile end -->
                        
                        <button type="submit" class="btn btn-primary shadow-none w-100 d-block">SUBMIT</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /Carousel body end -->

    <?php require("inc/scripts.php"); ?>
    <script src="scripts/product.js"></script>
</body>
</html>