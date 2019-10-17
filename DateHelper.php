<?php

class DateHelper {

    public function currentDate($format = null) {
        $time = time();

        if (!isset($format)) {
            return $time;
        } else {
            return date($format, $t);
        }
    }

    public function toTimestamp($datetime) {
        return strtotime($datetime);
    }

    public function diffInTimestamp($start, $end = null) {
        if (!isset($end)) {
            $end = new DateTime("now");
        } 

        if (isValidTimeStamp($start) && isValidTimeStamp($end)) {
            $dif = $end - $start;
            if ($dif < 0) {
                throw new Exception("Error: " . "Datedifference is negative.");
            } else {
                return $dif;
            }
        }
    }

    public function isValidTimeStamp($datetime) {
        if (is_numeric($datetime) && (int)$datetime == $datetime && $datetime <= 2147483647) {
            return true;
        } else {
            return strtotime($datetime);
        }
    }

    public function addDays($days, $datetime = null) {
        $adjustment = $days * 86400;
        if (!isset($datetime)) {
            return $this->currentDate() + $adjustment;
        } else {
            if ($this->isValidTimeStamp($datetime)) {
                return $datetime + $adjustment;
            } else {
                return $this->toTimestamp($datetime) + $adjustment;
            }
        }
    }

    public function addWeeks($weeks, $datetime = null) {
        $adjustment = $weeks * 604800;
        if (!isset($datetime)) {
            return $this->currentDate() + $adjustment;
        } else {
            if ($this->isValidTimeStamp($datetime)) {
                return $datetime + $adjustment;
            } else {
                return $this->toTimestamp($datetime) + $adjustment;
            }
        }
    }

    public function addMonths($months, $datetime = null) {
        $adjustment = $months * (2.628 * 10 ** 6);
        if (!isset($datetime)) {
            return $this->currentDate() + $adjustment;
        } else {
            if ($this->isValidTimeStamp($datetime)) {
                return $datetime + $adjustment;
            } else {
                return $this->toTimestamp($datetime) + $adjustment;
            }
        }
    }

    public function addYears($years, $datetime = null) {
        $adjustment = $months * (3.154 * 10 ** 7);
        if (!isset($datetime)) {
            return $this->currentDate() + $adjustment;
        } else {
            if ($this->isValidTimeStamp($datetime)) {
                return $datetime + $adjustment;
            } else {
                return $this->toTimestamp($datetime) + $adjustment;
            }
        }
    }

    public function formatTimestamp($datetime, $format = null) {
        if (isset($format)) {
            return date($format, $datetime);
        }
        return date("Y-m-d h:m:s", $datetime);
    }
}