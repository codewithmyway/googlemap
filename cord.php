<?php

function get_gps_distance($lat1,$long1,$d,$angle)
    {
        # Earth Radious in KM
        $R = 6378.14;

        # Degree to Radian
        $latitude1 = $lat1 * (M_PI/180);
        $longitude1 = $long1 * (M_PI/180);
        $brng = $angle * (M_PI/180);

        $latitude2 = asin(sin($latitude1)*cos($d/$R) + cos($latitude1)*sin($d/$R)*cos($brng));
        $longitude2 = $longitude1 + atan2(sin($brng)*sin($d/$R)*cos($latitude1),cos($d/$R)-sin($latitude1)*sin($latitude2));

        # back to degrees
        $latitude2 = $latitude2 * (180/M_PI);
        $longitude2 = $longitude2 * (180/M_PI);

        # 6 decimal for Leaflet and other system compatibility
       $lat2 = round ($latitude2,6);
       $long2 = round ($longitude2,6);

       // Push in array and get back
       $tab[0] = $lat2;
       $tab[1] = $long2;
       return $tab;
     }
 print_r(get_gps_distance(21.753203776056047,83.98039580314018,123,0));


?>