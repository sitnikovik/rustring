<?php

namespace Sitnikovik\RussianStrings;

use InvalidArgumentException;

class Date
{
    public const MONTHS_COMMON_CASED = [
        'январь',
        'февраль',
        'март',
        'апрель',
        'май',
        'июнь',
        'июль',
        'август',
        'сентябрь',
        'октябрь',
        'ноябрь',
        'декабрь'
    ];

    public const MONTHS_POSSESSIVE_CASED = [
        'января',
        'февраля',
        'марта',
        'апреля',
        'мая',
        'июня',
        'июля',
        'августа',
        'сентября',
        'октября',
        'ноября',
        'декабря'
    ];

    public const MONTHS_PREPOSITIONAL_CASED = [
        'январе',
        'феврале',
        'марте',
        'апреле',
        'мае',
        'июне',
        'июле',
        'августе',
        'сентябре',
        'октябре',
        'ноябре',
        'декабре'
    ];

    /**
     * ### Возвращает динамическое время в виде строки.
     *
     * Например:
     * - "Только что"
     * - "5 минут назад"
     * - "Сегодня в 14:35"
     * - "Вчера в 14:35"
     * - "10 января 2001"
     *
     * @param string|null $dateEnd
     * @return string
     */
    public static function toDynamic(?string $dateEnd = null): string
    {
        $toTimestamp = self::createTimestamp($dateEnd ?? 'now');
        if ($toTimestamp === null) {
            throw new InvalidArgumentException(sprintf('Incoming dateEnd string "%s" is incorrect', $dateEnd));
        }

        $diff = time() - $toTimestamp;

        if ($diff < 60){
            return 'Только что';
        } elseif ($diff < 60 * 60) {
            return ceil($diff / 60) . ' минут назад';
        } elseif (($diff < 60 * 60 * 24) && date('j', $toTimestamp) === date('j')) {
            return 'Сегодня в '.date('H:i', $toTimestamp);
        } elseif (($diff < 60 * 60 * 24 * 2) && (int)(date('j') - date('j', $toTimestamp) ) === 1) {
            return 'Вчера в '.date('H:i', $toTimestamp);
        }

        return sprintf(
            '%s %s %s',
            date('j', $toTimestamp),
            self::MONTHS_POSSESSIVE_CASED[date('n', $toTimestamp)],
            date('Y', $toTimestamp)
        );
    }

    /**
     * ### Возвращает динамическое время в виде строки.
     *
     * Например:
     * - "Сегодня"
     * - "Вчера"
     * - "10 января"
     *
     * @param string|null $dateEnd
     * @return string
     */
    public static function toDynamicShort(?string $dateEnd = null): string
    {
        $toTimestamp = self::createTimestamp($dateEnd ?? 'now');
        if ($toTimestamp === null) {
            throw new InvalidArgumentException(sprintf('Incoming dateEnd string "%s" is incorrect', $dateEnd));
        }

        $diff = time() - $toTimestamp;

        if (($diff < 60 * 60 * 24) && date('j', $toTimestamp) === date('j')) {
            return 'Сегодня';
        } elseif (($diff < 60 * 60 * 24 * 2) && (int)(date('j') - date('j', $toTimestamp) ) === 1) {
            return 'Вчера';
        }

        return sprintf(
            '%s %s',
            date('j', $toTimestamp),
            self::MONTHS_POSSESSIVE_CASED[date('n', $toTimestamp)]
        );
    }

    /**
     * ### Возвращает числовую метку времени Unix согласно строке.
     *
     * @param string $date
     * @return int|null
     */
    public static function createTimestamp(string $date): ?int
    {
        $timestamp= is_numeric($date)
            ? $date
            : strtotime($date);

        return $timestamp !== false ? $timestamp : null;
    }
}