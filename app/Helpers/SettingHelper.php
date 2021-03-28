<?php

if (!function_exists('setting')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function setting($key, $default=null)
    {
        return \App\Models\Setting::get($key, $default);
    }
}
