<?php
include('config.php');
function claim5($PHPSESSID, $url, $UA){
        reset5($PHPSESSID, $url, $UA);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent=".$UA;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['confirm_exploaration_point_claim'] = '5';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        $info_code = $info["http_code"];
        if ($info_code == 200){
                sleep(1);
                echo $result;
        }
        else{
                claim5($PHPSESSID, $url, $UA);
        }
}
function reset5($PHPSESSID, $url, $UA){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent=".$UA;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['reset_contest_button'] = '5';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_reset($ch);
}


claim5($PHPSESSID, $url, $UA);
?>
