<?php
// функции для работы со временем

    // фуя получает число и возвращает количество секунд, равное кол-ву дней от текущей даты
    function getDaysQuant (int $days) : int {
        $seconds = 3600;
        $hours = 24;
        return time() + $seconds * $hours * $days;
    }
