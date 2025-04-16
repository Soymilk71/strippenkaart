<?php

if (!function_exists('minutesToHours')) {
    function minutesToHours($minutes)
    {
        $uren = floor($minutes / 60);
        $minuten = $minutes % 60;

        return $uren . 'u' . ($minuten > 0 ? ' ' . $minuten . 'm' : '');
    }
}