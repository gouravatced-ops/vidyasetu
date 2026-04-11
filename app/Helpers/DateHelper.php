<?php

use Carbon\Carbon;

if (!function_exists('now_india')) {
    /**
     * Get current time in Asia/Kolkata timezone
     */
    function now_india(): Carbon
    {
        return Carbon::now('Asia/Kolkata');
    }
}

if (!function_exists('create_india_datetime')) {
    /**
     * Create a Carbon instance in Asia/Kolkata timezone
     */
    function create_india_datetime($time = null, $tz = null): Carbon
    {
        return Carbon::parse($time ?? 'now', $tz ?? 'Asia/Kolkata');
    }
}

if (!function_exists('format_india_date')) {
    /**
     * Format date in Indian format (DD-MM-YYYY)
     */
    function format_india_date($date, $format = 'd-m-Y'): string
    {
        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date, 'Asia/Kolkata');
        return $carbon->format($format);
    }
}

if (!function_exists('format_india_datetime')) {
    /**
     * Format datetime in Indian format
     */
    function format_india_datetime($date, $format = 'd-m-Y H:i:s'): string
    {
        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date, 'Asia/Kolkata');
        return $carbon->format($format);
    }
}