<?php
//GET APPLICATION NAME

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

if (!function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

//GET APPLICATION NAME
if (!function_exists('app_url')) {
    /**
     * Helper to grab the application url.
     *
     * @return mixed
     */
    function app_url()
    {
        return config('app.url');
    }
}

//CREATE CAPTCHA
if (!function_exists('createCaptcha')) {
    /**
     * Helper to generate captcha code.
     *
     * @return mixed
     */
    function createCaptcha()
    {
        $image_width = 120;
        $image_height = 40;
        $font_size_min = $image_height * 0.55;
        $font_size_max = $image_height * 0.90;
        $font = public_path() . '/theme/fonts/monofont.ttf';

        $possible_letters = '23456789BCDFGHJKMNPQRSTVWXYZ';

        // initialise image with dimensions
        $image = @imagecreatetruecolor($image_width, $image_height) or die("Cannot Initialize new GD image stream");

        // set background to white and allocate drawing colours
        $background = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
        imagefill($image, 0, 0, $background);
        $linecolor = imagecolorallocate($image, 0xCC, 0xCC, 0xCC);
        $textcolor = imagecolorallocate($image, 0x33, 0x33, 0x33);

        // draw random lines on canvas
        for ($i = 0; $i < 6; $i++) {
            imagesetthickness($image, rand(1, 3));
            imageline($image, 0, rand(0, 30), 120, rand(0, 30), $linecolor);
        }

        // add random digits to canvas
        $digit = '';
        for ($x = 1; $x <= 110; $x += 20) {
            //$digit .= ($num = rand(0, 9));
            $digit .= ($num = substr($possible_letters, mt_rand(0, strlen($possible_letters) - 1), 1));
            //imagechar($image, rand(5, 7), $x, rand(2, 10), $num, $textcolor);
            imagettftext($image, rand($font_size_min, $font_size_max), 0, $x, rand(28, 35), $textcolor, $font, $num);
        }

        // record digits in session variable
        $_SESSION['digit'] = $digit;

        // display image and clean up
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
    }
}

//GENERATE FLASH MESSAGE
if (!function_exists('flash_message')) {
    function flash_message()
    {
        if (Session::has('message')) {
            list($type, $message) = explode('|', Session::get('message'));
            if ($type == 'error') {
                $type = 'danger';
            } elseif ($type == 'message') {
                $type = 'info';
            } elseif ($type == 'success') {
                $type = 'success';
            }

            return '<div class="alert alert-' . $type . ' flash-message">' . $message . '</div>';
        }

        return '';
    }
}

//CREATE SEO FRIENDLY URL
if (!function_exists('seoUrl')) {
    function seoUrl($phrase, $maxLength = 100000000000000)
    {
        $result = strtolower($phrase);

      //  $result = preg_replace("~[^A-Za-z0-9-\s]~", "", $result);
        $result = trim(preg_replace("~[\s-]+~", " ", $result));
        $result = trim(substr($result, 0, $maxLength));
        $result = preg_replace("~\s~", "-", $result);

        return $result;
    }
}

//CREATE Y-m-d FORMATE DATE
if (!function_exists('convertToMySqlDate')) {
    function convertToMySqlDate($date, $fromFormat = 'd-m-Y', $toFormat = 'Y-m-d')
    {
        $dt = new DateTime();
        $datetime = $dt->createFromFormat($fromFormat, $date)->format($toFormat);
        return $datetime;
    }
}

//CHANGE DATE FORMATE OF A DATE
if (!function_exists('formatDate')) {
    function formatDate($date, $fromFormat = 'Y-m-d', $toFormat = 'd-M-Y')
    {
        $dt = new DateTime();
        if ($date != null) {
            $datetime = $dt->createFromFormat($fromFormat, $date)->format($toFormat);
            return $datetime;
        } else {
            return '';
        }
    }
}

//CREATE A RELATIVE TIME FROM A DATE
if (!function_exists('getRelativeTime')) {
    function getRelativeTime($datetime)
    {
        //$timestamp = \DateTime::createFromFormat('Y-m-d H:i:s', $datetime)->getTimestamp();
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = strtotime($datetime);
        // Get time difference and setup arrays
        $difference = time() - $timestamp;
        $periods = array("second", "minute", "hour", "day", "week", "month", "years");
        $lengths = array("60", "60", "24", "7", "4.35", "12");

        // Past or present
        if ($difference >= 0) {
            $ending = "ago";
        } else {
            $difference = -$difference;
            $ending = "to go";
        }

        // Figure out difference by looping while less than array length
        // and difference is larger than lengths.
        $arr_len = count($lengths);
        for ($j = 0; $j < $arr_len && $difference >= $lengths[$j]; $j++) {
            $difference /= $lengths[$j];
        }

        // Round up
        $difference = round($difference);

        // Make plural if needed
        if ($difference != 1) {
            $periods[$j] .= "s";
        }

        // Default format
        $text = "$difference $periods[$j] $ending";

        // over 24 hours
        if ($j > 2) {
            // future date over a day formate with year
            if ($ending == "to go") {
                if ($j == 3 && $difference == 1) {
                    $text = "Tomorrow at " . date("g:i a", $timestamp);
                } else {
                    $text = date("F j, Y \a\\t g:i a", $timestamp);
                }
                return $text;
            }

            if ($j == 3 && $difference == 1) { // Yesterday
                $text = "Yesterday at " . date("g:i a", $timestamp);
            } else if ($j == 3) { // Less than a week display -- Monday at 5:28pm
                $text = date("l \a\\t g:i a", $timestamp);
            } else if ($j < 6 && !($j == 5 && $difference == 12)) { // Less than a year display -- June 25 at 5:23am
                $text = date("F j \a\\t g:i a", $timestamp);
            } else { // if over a year or the same month one year ago -- June 30, 2010 at 5:34pm
                $text = date("F j, Y \a\\t g:i a", $timestamp);
            }
        }

        return $text;
    }
}

//GET FIRST N NUMBER OF CHARECTER FROM STRING
if (!function_exists('firstNwords')) {
    function firstNwords($text, $length = 160, $dots = true)
    {
        $text = trim(preg_replace('#[\s\n\r\t]{2,}#', ' ', $text));
        $text_temp = $text;
        while (substr($text, $length, 1) != " ") {
            $length++;
            if ($length > strlen($text)) {
                break;
            }
        }
        $text = substr($text, 0, $length);
        return $text . (($dots == true && $text != '' && strlen($text_temp) > $length) ? ' ...' : '');
    }
}


if (!function_exists('generateRandomCode')) {
    function generateRandomCode()
    {
        $possible_letters = '23456789BCDFGHJKMNPQRSTVWXYZ';
        $code = '';
        for ($x = 0; $x < 6; $x++) {
            $code .= ($num = substr($possible_letters, mt_rand(0, strlen($possible_letters) - 1), 1));
        }
        return $code;
    }
}

if (!function_exists('generateOTP')) {
    function generateOTP()
    {
        $possible_letters = '1234567890';
        $code = '';
        for ($x = 0; $x < 6; $x++) {
            $code .= ($num = substr($possible_letters, mt_rand(0, strlen($possible_letters) - 1), 1));
        }
        return $code;
    }
}

//encrypt password
if (!function_exists('encrypt_password')) {
    function encrypt_password($password)
    {
        return hash('sha512', $password);
    }
}

if (!function_exists('getTimeDiffInSecond')) {
    function getTimeDiffInSecond($time1, $time2)
    {
        $seconds = (strtotime($time1) - strtotime($time2));

        return $seconds;
    }
}

if (!function_exists('getTimeDiffInMinute')) {
    function getTimeDiffInMinute($time1, $time2)
    {
        $minutes = (strtotime($time1) - strtotime($time2)) / 60;

        return $minutes;
    }
}

// Function to get the client IP address
if (!function_exists('get_client_ip')) {
    function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }
}

if (!function_exists('validMimeType')) {
    function validMimeType($file)
    {
        $file_mime = $file->getMimeType();

        $is_valid_mime = false;
        if ($file_mime == 'application/pdf') {
            $is_valid_mime = true;
        }
        return $is_valid_mime;
    }
}

if (!function_exists('countryOptions')) {
    function countryOptions()
    {
        $countries = DB::table('gs_countries')->orderBy('sort_order', 'ASC')->pluck('name','cntry_code');
        return $countries;
    }
}


if ( ! function_exists('audit_trail')){
    function audit_trail($msg) {

		$at_table	=	'user_audit_trail';

		$data		=	array(
								'at_message'	=>	$msg,
								'at_user'		=>	Session::get('user')->user_id,
								'at_date'		=>	date('Y-m-d H:i:s'),
								'at_ip'			=>	$_SERVER['REMOTE_ADDR']
							);
		DB::table('user_audit_trail')->insert($data);
    }
}


function activeMenu($uri = []) {
    $active = '';
    foreach($uri as $key=>$value){
        if (Request::is($value)) {
            $active = 'active';
            break;
        }
    }
    return $active;
}
