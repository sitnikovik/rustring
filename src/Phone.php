<?php

namespace Sitnikovik\RussianStrings;

/**
 *
 */
class Phone
{
    /**
     * Определяет, корректен ли номер телефона.
     *
     * Работает только с российскими номерами.
     *
     * @param string $phone
     * @return bool
     */
    public static function isValid(string $phone): bool
    {
        if ($phone[0] == "9" && strlen($phone) > 9) {
            return false;
        }
        if (strlen(preg_replace('/\D/', $phone)) <> 10) {
            return false;
        }
        if ($phone[0] != "7" && $phone[0] != "+" && $phone[0] != "8") {
            return false;
        }

        return true;
    }

    /**
     * Приводит номер телфона к виду "+7 (916) 123-45-67".
     *
     * @param string $phone
     * @return string
     */
    public static function beatify(string $phone): string
    {
        if (preg_match("/\(/",$phone)) {
            return $phone;
        }

        $result = $phone;
        if ($phone[0] == "8" || $phone[0] == "7") {
            $result = sprintf(
                '+7 (%s) %s-%s-%s',
                substr($phone,1,3),
                substr($phone,4,3),
                substr($phone,7,2),
                substr($phone,9,2)
            );
        }

        return $result;
    }
}