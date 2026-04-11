<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

abstract class Controller
{
    /**
     * Get current time in Asia/Kolkata timezone
     */
    protected function now(): Carbon
    {
        return Carbon::now('Asia/Kolkata');
    }

    /**
     * Create a Carbon instance in Asia/Kolkata timezone
     */
    protected function createDateTime($time = null, $tz = null): Carbon
    {
        return Carbon::parse($time ?? 'now', $tz ?? 'Asia/Kolkata');
    }

    /**
     * Format date for display in Indian format
     */
    protected function formatDate($date, $format = 'd-m-Y'): string
    {
        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date, 'Asia/Kolkata');
        return $carbon->format($format);
    }

    /**
     * Format datetime for display
     */
    protected function formatDateTime($date, $format = 'd-m-Y H:i:s'): string
    {
        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date, 'Asia/Kolkata');
        return $carbon->format($format);
    }
}
