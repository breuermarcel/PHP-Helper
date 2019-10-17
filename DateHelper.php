<?php

class DateHelper {

    static function getDatedif($start, $end) {
        try {
            if (isValidTimeStamp($start) && isValidTimeStamp($end)) {
                // Check if datedif <= 0
                $dif = $end - $start;
                if ($dif < 0) {
                    throw new Exception("Error: " . "Datedifference is negative.");
                } else {
                    return $dif;
                }
            }
        } catch (Exception $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    static function isValidTimeStamp($timestamp) {
        if (is_numeric($timestamp) && (int)$timestamp == $timestamp && $timestamp <= 2147483647) {
            return true;
        } else {
            try {
                return strtotime($timestamp);
            } catch (Exception $e) {
                throw new Exception("Error: " . $e->getMessage());
            }
        }
}