<?php

use Illuminate\Support\Facades\Storage;

require_once("jdf.php");

if (!function_exists('g_date')) {

    function g_date($date = "")
    {
        if (!$date) {
            return null;
        }

        $arrDate = explode("/", trim($date));

        return jalali_to_gregorian($arrDate[0], $arrDate[1], $arrDate[2], '-');
    }
}

if (!function_exists('error_msg')) {

    function error_msg($msg = "")
    {
        if ($msg) {
            $return = '<h6 class="text-center text-danger m-0">';
            $return .= $msg;
            $return .= '</h6>';
        } else {
            $return = '<h6 class="text-center text-danger m-0">';
            $return .= 'خطا در انجام عملیات!';
            $return .= '</h6>';
        }

        return $return;
    }
}

if (!function_exists('success_msg')) {

    function success_msg($msg = "")
    {
        if ($msg) {
            $return = '<h6 class="text-center text-success m-0">';
            $return .= $msg;
            $return .= '</h6>';
        } else {
            $return = '<h6 class="text-center text-success m-0">';
            $return .= 'عملیات با موفقیت انجام شد.';
            $return .= '</h6>';
        }

        return $return;
    }
}

if (!function_exists('user_role')) {

    function user_role($role, $show = false)
    {
        if ($role == '>4;dds||?>') {

            // admin
            if ($show) {
                return 'Admin';
            }
            return 1;

        } elseif ($role == 'd?[t%$#sl') {

            // user
            if ($show) {
                return 'User';
            }
            return 2;

        } else {

            return 0;
        }
    }
}

if (!function_exists('user_role_char')) {

    function user_role_char($role)
    {
        if ($role == 1) {

            // admin
            return '>4;dds||?>';

        } elseif ($role == 2) {

            // ad
            return 'd?[t%$#sl';

        } elseif ($role == 3) {

            // retail
            return 'dp+tf7%s$';

        } else {

            return 0;
        }
    }
}

if (!function_exists('user_permission')) {
    function user_permission($user_permission, $needed_permission = '')
    {
        if (in_array('1', str_split($user_permission))) {
            return true;
        } elseif (count(array_intersect(str_split($user_permission), str_split($needed_permission)))) {
            return true;
        }
        return false;
    }
}

if (!function_exists('get_setting')) {
    function get_setting()
    {
        $setting = json_decode(Storage::get('setting.json'), true);

        $setting['site_title'] = isset($setting['site_title']) ? $setting['site_title'] : '';
        $setting['site_description'] = isset($setting['site_description']) ? $setting['site_description'] : '';
        $setting['site_contact'] = isset($setting['site_contact']) ? $setting['site_contact'] : '';

        return $setting;
    }
}

if (!function_exists('set_setting')) {
    function set_setting($data)
    {
        // main
        $set_data['site_title'] = isset($data['site_title']) ? $data['site_title'] : '';
        $set_data['site_description'] = isset($data['site_description']) ? $data['site_description'] : '';
        $set_data['logo'] = isset($data['logo']) ? $data['logo'] : '';
        $set_data['icon'] = isset($data['icon']) ? $data['icon'] : '';

        // contact info
        $set_data['site_contact']['phone'] = isset($data['phone']) ? $data['phone'] : '';
        $set_data['site_contact']['email'] = isset($data['email']) ? $data['email'] : '';
        $set_data['site_contact']['address'] = isset($data['address']) ? $data['address'] : '';
        $set_data['site_contact']['address'] = isset($data['address']) ? $data['address'] : '';

        //footer_content
        $set_data['footer_content'] = isset($data['footer_content']) ? $data['footer_content'] : '';

        // socials
        if (isset($data['social_title']) && count($data['social_title'])) {
            foreach ($data['social_title'] as $key => $social_title) {
                $set_data['socials'][$key] = [
                    'title' => $social_title,
                    'icon' => $data['social_icon'][$key],
                    'link' => $data['social_link'][$key],
                ];
            }
        }

        Storage::put('setting.json', json_encode($set_data));

        return $set_data;
    }
}

if (!function_exists('show_serial')) {
    function show_serial($serial)
    {
        $serial[4] = '*';
        $serial[5] = '*';
        $serial[6] = '*';
        return $serial;
    }
}

