<?php

namespace Sitnikovik\RussianStrings;

/**
 *
 */
class Strings
{
    private const CYRILLIC_CHARS = [
        'а','б','в','г','д',
        'е','ё','ж','з','и','й','к','л','м','н','о','п', 'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю',
        'я', 'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П', 'Р','С','Т','У','Ф','Х','Ц','Ч',
        'Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
    ];

    private const LATIN_CHARS = [
        'a','b','v','g','d',
        'e','io','zh','z','i','y','k','l','m','n','o','p', 'r','s','t','u','f','h','ts','ch','sh','sht',
        'a','i','y','e','yu','ya', 'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P', 'R','S',
        'T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
    ];

    /**
     * Морфологическое склонение по числу.
     *
     * @param int $num
     * @param string $for1
     * @param string $for2
     * @param string $for5
     * @return string
     */
    public static function morph(int $num, string $for1, string $for2, string $for5): string
    {
        $num = abs($num) % 100;
        $num_x = $num % 10;

        if ($num > 10 && $num < 20) {
            return $for5;
        }elseif ($num_x > 1 && $num_x < 5) {
            return $for2;
        }elseif ($num_x == 1) {
            return $for1;
        }

        return $for5;
    }

    /**
     * Склонение слова в родительном падеже
     *
     * Отвечает на вопросы "Кого? Чего?"
     *
     * @param string $needle Слово в именительном падеже
     * @return string
     */
    public static function toGenitiveCase(string $needle): string
    {
        $endCases = [
            'а' => 'ы',
            'б' => 'ба',
            'в' => 'ва',
            'г' => 'га',
            'д' => 'да',
            'е' => 'е',
            'ж' => 'жа',
            'з' => 'за',
            'и' => 'и',
            'й' => 'я',
            'к' => 'ка',
            'л' => 'ла',
            'м' => 'ма',
            'н' => 'на',
            'о' => 'о',
            'п' => 'па',
            'р' => 'ра',
            'с' => 'са',
            'т' => 'та',
            'у' => 'у',
            'ф' => 'фа',
            'х' => 'ха',
            'ч' => 'ча',
            'ш' => 'ша',
            'э' => 'э',
            'ю' => 'ю',
            'ь' => 'я',
            'я' => 'и',
            'ы' => 'ю'
        ];

        return self::replaceEndOfStringForCase($needle, $endCases);
    }

    /**
     * Склонение слова в дательном падеже
     *
     * Отвечает на вопросы "Кому? Чему?"
     *
     * @param string $needle Слово в именительном падеже
     * @return string
     */
    public static function toDativeCase(string $needle): string
    {
        $endCases = [
            'а' => 'е',
            'б' => 'бу',
            'в' => 'ву',
            'г' => 'гу',
            'д' => 'ду',
            'е' => 'е',
            'ж' => 'жу',
            'з' => 'зу',
            'и' => 'и',
            'й' => 'ю',
            'к' => 'ку',
            'л' => 'лу',
            'м' => 'му',
            'н' => 'ну',
            'о' => 'о',
            'п' => 'пу',
            'р' => 'ру',
            'с' => 'су',
            'т' => 'ту',
            'у' => 'у',
            'ф' => 'фу',
            'х' => 'ху',
            'ч' => 'чу',
            'ш' => 'шу',
            'э' => 'э',
            'ю' => 'ю',
            'ь' => 'ю',
            'я' => 'ю',
            'ы' => 'у'
        ];

        return self::replaceEndOfStringForCase($needle, $endCases);
    }

    /**
     * Склонение слова в винительном падеже
     *
     * Отвечает на вопросы "Кого? Что?"
     *
     * @param string $needle Слово в именительном падеже
     * @return string
     */
    public static function toAccusativeCase(string $needle): string
    {
        $endCases = [
            'а' => 'у',
            'б' => 'ба',
            'в' => 'ва',
            'г' => 'га',
            'д' => 'да',
            'е' => 'е',
            'ж' => 'жа',
            'з' => 'за',
            'и' => 'и',
            'й' => 'я',
            'к' => 'ка',
            'л' => 'ла',
            'м' => 'ма',
            'н' => 'на',
            'о' => 'о',
            'п' => 'па',
            'р' => 'ра',
            'с' => 'са',
            'т' => 'та',
            'у' => 'у',
            'ф' => 'фа',
            'х' => 'ха',
            'ч' => 'ча',
            'ш' => 'ша',
            'э' => 'э',
            'ю' => 'ю',
            'ь' => 'ю',
            'я' => 'ю',
            'ы' => 'ю'
        ];

        return self::replaceEndOfStringForCase($needle, $endCases);
    }

    /**
     * Склонение слова в творительном падеже
     *
     * Отвечает на вопросы "Кем? Чем?"
     *
     * @param string $needle Слово в именительном падеже
     * @return string
     */
    public static function toInstrumentalCase(string $needle): string
    {
        $endCases = [
            'а' => 'ой',
            'б' => 'бом',
            'в' => 'вом',
            'г' => 'гом',
            'д' => 'дом',
            'е' => 'е',
            'ж' => 'жом',
            'з' => 'зом',
            'и' => 'и',
            'й' => 'ем',
            'к' => 'ком',
            'л' => 'лом',
            'м' => 'мом',
            'н' => 'ном',
            'о' => 'о',
            'п' => 'пом',
            'р' => 'ром',
            'с' => 'сом',
            'т' => 'том',
            'у' => 'у',
            'ф' => 'фом',
            'х' => 'хом',
            'ч' => 'чом',
            'ш' => 'шом',
            'э' => 'э',
            'ю' => 'ю',
            'ь' => 'ьей',
            'я' => 'ей',
            'ы' => 'ей'
        ];

        return self::replaceEndOfStringForCase($needle, $endCases);
    }

    /**
     * Склонение слова в повелительном падеже
     *
     * Отвечает на вопросы "О ком? О чем?"
     *
     * @param string $needle Слово в именительном падеже
     * @return string
     */
    public static function toImperativeCase(string $needle): string
    {
        $endCases = [
            'а' => 'е',
            'б' => 'бе',
            'в' => 'ве',
            'г' => 'ге',
            'д' => 'де',
            'е' => 'е',
            'ж' => 'же',
            'з' => 'зе',
            'и' => 'и',
            'й' => 'е',
            'к' => 'ке',
            'л' => 'ле',
            'м' => 'ме',
            'н' => 'не',
            'о' => 'о',
            'п' => 'пе',
            'р' => 'ре',
            'с' => 'се',
            'т' => 'те',
            'у' => 'у',
            'ф' => 'фе',
            'х' => 'хе',
            'ч' => 'че',
            'ш' => 'ше',
            'э' => 'э',
            'ю' => 'ю',
            'ь' => 'и',
            'я' => 'е',
            'ы' => 'и'
        ];

        return self::replaceEndOfStringForCase($needle, $endCases);
    }

    /**
     * Заменить окончание слова при склонении слова по падежу
     *
     * @param $needle
     * @param $endCases
     * @return string
     */
    private static function replaceEndOfStringForCase($needle, $endCases): string
    {
        $charCount = strlen($needle);
        $strEnd = $needle[$charCount - 2] . $needle[$charCount-1];

        return substr($needle, 0, $needle-2) . $endCases[$strEnd];
    }

    /**
     * Приводит строку к виду "someString".
     *
     * @param string $needle
     * @return string
     */
    public static function toCamelCase(string $needle): string
    {
        $camelCased = '';
        $keysToGetLow = [];
        foreach (str_split($needle) as $i => $char) {
            if (preg_match('/\w/', $char)) {
                $keysToGetLow[] = $i + 1;
                continue;
            }

            $camelCased .= (in_array($i, $keysToGetLow))
                ? strtoupper($char)
                : $char;
        }

        return $camelCased;
    }

    /**
     * Приводит строку к виду "some_string".
     *
     * @param string $needle
     * @return string
     */
    public static function toSnakeCase(string $needle): string
    {
        return self::mapForKebabOrSnakeCaseToString($needle, '_');
    }

    /**
     * Приводит строку к виду "some-string".
     *
     * @param string $needle
     * @return string
     */
    public static function toKebabCase(string $needle): string
    {
        return self::mapForKebabOrSnakeCaseToString($needle, '-');
    }

    private static function mapForKebabOrSnakeCaseToString(string $needle, string $separator): string
    {
        $result = '';
        foreach (str_split(trim($needle)) as $i => $char) {
            if ($i == 0) {
                $char = strtolower($char);
            }

            $result .= (ctype_upper($char) || !preg_match('/\w/', $char))
                ? $separator . strtolower($char)
                : $char;
        }

        return $result;
    }

    /**
     * Заменить в строке кириллицу на латиницу.
     *
     * @param string $text
     * @return string
     */
    public static function toLatin(string $text): string
    {
        return str_replace(self::CYRILLIC_CHARS, self::LATIN_CHARS, $text);
    }

    /**
     * Заменить в строке латиницу на кириллицу.
     *
     * @param string $text
     * @return string
     */
    public static function toCyrillic(string $text): string
    {
        return str_replace(self::LATIN_CHARS, self::CYRILLIC_CHARS, $text);
    }

    /**
     * Обрезать строку.
     *
     * @param string $text
     * @param int $separateOn
     * @return string
     */
    public static function truncate(string $text, int $separateOn = 15): string
    {
        return (strlen($text) > $separateOn)
            ? substr($text, 0, $separateOn) . '...'
            : $text;
    }
}