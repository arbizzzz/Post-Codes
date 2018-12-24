<?php include_once('connect.php');?>
<?php include_once('header.php');?>
<div class="container d-flex justify-content-center h-100 align-items-center">
    <div class="col-lg-7 mx-auto border rounded p-5 mh-50 form-container">
        <form action="" method="POST">
            <h3>Place Finder</h3>
            <label class="mt-3">
                Select Country :
                <select class="rounded" name="select" required>
                    <option selected disabled>Select</option>
                    <?php
                    $arr    = array();
                    $sql_countries    = "SELECT DISTINCT `Name Code`,`Country Name` FROM `post codes`;";
                    $result_countries = mysqli_query($connection,$sql_countries);
                    while( $row = mysqli_fetch_assoc($result_countries)) {
                        $arr[] = $row;
                    }
                    foreach ($arr as  $k=>$item):
                        $country_name = $item['Country Name'];
                        $name_code = $item['Name Code'];
                        ?>
                        <option value="<?php echo $name_code ?>"><?php echo $country_name.'('.$name_code.')'; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <input type="text" name="zipcode" class="form-control mb-3 mt-3" placeholder="Zip Code" required>
            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block  mt-3">
        </form>
        <?php if(isset($_POST['submit'])){
            $code = $_POST['zipcode'];
            $name_code = $_POST['select'];
            $sql = "SELECT * FROM `post codes` WHERE `Post Code`='$code' AND `Name Code`='$name_code'";
            $result = mysqli_query($connection,$sql);
            $check_rows = mysqli_num_rows($result);
            $array = array();
            while( $row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
            if($check_rows > 0){
                foreach ($array as $item):
                    $post_code =    $item['Post Code'];
                    $place_name =   $item['Place Name'];
                    $country_name = $item['Country Name'];
                    $lat = $item['latitude'];
                    $lon = $item['longitude'];
                    echo 'Zip Code:  ' . $post_code . '<br>';
                    echo 'Places :   ' . $place_name . '<br>';
                    echo 'Latitude : ' .$lat. ' ,Longitude : ' .$lon .'<br>';
                    echo 'Country :  ' . $country_name ;
                endforeach;
            }elseif($check_rows == 0){
                $json_url = 'api.zippopotam.us/'.$name_code.'/'.$code;
                $crl = curl_init();
                curl_setopt($crl, CURLOPT_URL, $json_url);
                curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
                $json = curl_exec($crl);
                curl_close($crl);
                $api_array = json_decode($json, TRUE);
                if(count($api_array) == 0){
                    echo '
                    <div class="alert alert-danger" role="alert">
                        Nothing Found!
                    </div>';
                }else{
                    $country = null;
                    $name    = null;
                    $lat     = null;
                    $lon     = null;
                    foreach ($api_array as $place):
                        $country = $api_array['country'];
                        foreach ($api_array['places'] as $place_name):
                            $name = $place_name['place name'];
                            $lat  = $place_name['latitude'];
                            $lon  = $place_name['longitude'];
                        endforeach;
                    endforeach;
                    $insert_sql = "INSERT INTO `post codes`(`ID`,`Post Code`,`Place Name`,`latitude`,`longitude`,`Name Code`,`Country Name`) VALUES ('','$code','$name','$lat','$lon','$name_code','$country')";
                    $result = mysqli_query($connection,$insert_sql);
                    echo 'Zip Code:  ' . $code . '<br>';
                    echo 'Places :   ' . $name . '<br>';
                    echo 'Latitude : ' .$lat. ' ,Longitude : ' .$lon .'<br>';
                    echo 'Country :  ' . $country ;
                }
            }
        }?>
    </div>
</div>

<?php include_once('footer.php');?>