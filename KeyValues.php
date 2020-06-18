<?php

declare(strict_types=1);

function errorHandler(int $errno , string $error) : bool {

    print_r("ERROR #" . $errno . " -> " . $error . PHP_EOL);

    if ($errno != E_USER_NOTICE) {
        print_r(json_encode(debug_backtrace(), JSON_PRETTY_PRINT) . PHP_EOL);
    }

    exit(1);
}

function parseEntities(string $file, array $entities) : void {

    if (!is_array($entities)) {
        trigger_error("EntitiesParser: entities is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
        return;
    }

    global $fieldName;

    foreach ($entities as $section => $entity) {

        if (!is_array($entity)) {
            trigger_error("EntitiesParser: key '$section' is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
            return;
        }

        // foreach key
        $totalKeys = 0;
        // check requires
        foreach ($entity as $key => $val) {
            if (in_array($key, $fieldName['entities']['require'], true)) {
                $totalKeys++;
            }
        }
        if (count($fieldName['entities']['require']) != $totalKeys) {
            foreach ($fieldName['entities']['require'] as $key) {
                if (!isset($entity[$key])) {
                    trigger_error("EntitiesParser: missing filed '$key' in '$section'." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                    return;
                }
            }
        }

        foreach ($entity as $key => $val) {
            if (!in_array($key, $fieldName['entities']['optional'], true) && !in_array($key, $fieldName['entities']['require'], true)) {
                trigger_error("EntitiesParser: redundant filed '$key' in '$section'." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                return;
            }
        }
    }
}

function parseBossHp(string $file, array $BossHp) : void {

    if (!is_array($BossHp)) {
        trigger_error("BossHpParser: entities is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
        return;
    }

    global $fieldName;

    if (isset($BossHp['breakable'])) {

        if (!is_array($BossHp['breakable'])) {
            trigger_error("BossHpParser: breakable is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
            return;
        }

        foreach ($BossHp['breakable'] as $section => $breakable) {

            if (!is_array($breakable)) {
                trigger_error("BossHpParser: key '$section' is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                return;
            }

            // foreach key
            $totalKeys = 0;
            // check requires
            foreach ($breakable as $key => $val) {
                if (in_array($key, $fieldName['BossHP']['optional']['breakable']['require'], true)) {
                    $totalKeys++;
                }
            }
            if (count($fieldName['BossHP']['optional']['breakable']['require']) != $totalKeys) {
                foreach ($fieldName['BossHP']['optional']['breakable']['require'] as $key) {
                    if (!isset($breakable[$key])) {
                        trigger_error("BossHpParser: missing filed '$key' in '$section'." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                        return;
                    }
                }
            }
            foreach ($breakable as $key => $val) {
                if (!in_array($key, $fieldName['BossHP']['optional']['breakable']['optional'], true) && !in_array($key, $fieldName['BossHP']['optional']['breakable']['require'], true)) {
                    trigger_error("BossHpParser: redundant filed '$key' in '$section'." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                    return;
                }
            }
        }
    }

    if (isset($BossHp['counter'])) {

        if (!is_array($BossHp['counter'])) {
            trigger_error("BossHpParser: breakable is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
            return;
        }

        foreach ($BossHp['counter'] as $section => $counter) {

            if (!is_array($counter)) {
                trigger_error("BossHpParser: key '$section' is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                return;
            }

            // foreach key
            $totalKeys = 0;
            // check requires
            foreach ($counter as $key => $val) {
                if (in_array($key, $fieldName['BossHP']['optional']['counter']['require'], true)) {
                    $totalKeys++;
                }
            }
            if (count($fieldName['BossHP']['optional']['counter']['require']) != $totalKeys) {
                foreach ($fieldName['BossHP']['optional']['counter']['require'] as $key) {
                    if (!isset($counter[$key])) {
                        trigger_error("BossHpParser: missing filed '$key' in '$section'." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                        return;
                    }
                }
            }
            foreach ($counter as $key => $val) {
                if (!in_array($key, $fieldName['BossHP']['optional']['counter']['optional'], true) && !in_array($key, $fieldName['BossHP']['optional']['counter']['require'], true)) {
                    trigger_error("BossHpParser: redundant filed '$key' in '$section'." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                    return;
                }
            }
        }
    }
}

function parseTranslations(string $file, array $translations) : void {

    if (!is_array($translations)) {
        trigger_error("TranslationsParser: translations is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
        return;
    }

    global $fieldName;

    foreach ($translations as $section => $tran) {

        if (!is_array($tran)) {
            trigger_error("TranslationsParser: key '$section' is not an array." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
            return;
        }

        // foreach key
        $totalKeys = 0;
        // check requires
        foreach ($tran as $key => $val) {
            if (in_array($key, $fieldName['Console_T']['require'], true)) {
                $totalKeys++;
            }
        }
        if (count($fieldName['Console_T']['require']) != $totalKeys) {
            foreach ($fieldName['Console_T']['require'] as $key) {
                if (!isset($tran[$key])) {
                    trigger_error("TranslationsParser: missing filed '$key' in '$section'." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                    return;
                }
            }
        }
        foreach ($tran as $key => $val) {
            if (!in_array($key, $fieldName['Console_T']['optional'], true) && !in_array($key, $fieldName['Console_T']['require'], true)) {
                trigger_error("TranslationsParser: redundant filed '$key' in '$section'." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                return;
            }
        }
    }
}

// a simple parser for Valve's KeyValue format
// https://developer.valvesoftware.com/wiki/KeyValues
//
// author: Rossen Popov, 2015-2016
function KvParser(string $file) : ?array
{

    $text = file_get_contents($file);

    if(!is_string($text)) {
        trigger_error("KvParser expects parameter 1 to be a string, " . gettype($text) . " given." . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
        return null;
    }

    // detect and convert utf-16, utf-32 and convert to utf8
    if      (substr($text, 0, 2) == "\xFE\xFF")         $text = mb_convert_encoding($text, 'UTF-8', 'UTF-16BE');
    else if (substr($text, 0, 2) == "\xFF\xFE")         $text = mb_convert_encoding($text, 'UTF-8', 'UTF-16LE');
    else if (substr($text, 0, 4) == "\x00\x00\xFE\xFF") $text = mb_convert_encoding($text, 'UTF-8', 'UTF-32BE');
    else if (substr($text, 0, 4) == "\xFF\xFE\x00\x00") $text = mb_convert_encoding($text, 'UTF-8', 'UTF-32LE');

    // strip BOM
    $text = preg_replace('/^[\xef\xbb\xbf\xff\xfe\xfe\xff]*/', '', $text);

    $lines = preg_split('/\n/', $text);

    $arr = array();
    $stack = array(0=>&$arr);
    $expect_bracket = false;

    $re_keyvalue = '~^("(?P<qkey>(?:\\\\.|[^\\\\"])+)"|(?P<key>[a-z0-9\\-\\_]+))' .
        '([ \t]*(' .
        '"(?P<qval>(?:\\\\.|[^\\\\"])*)(?P<vq_end>")?' .
        '|(?P<val>[a-z0-9\\-\\_]+)' .
        '))?~iu';

    $j = count($lines);
    for($i = 0; $i < $j; $i++) {
        $line = trim($lines[$i]);

        // skip empty and comment lines
        if( $line == "" || $line[0] == '/') { continue; }

        // one level deeper
        if( $line[0] == "{" ) {
            $expect_bracket = false;
            continue;
        }

        if($expect_bracket) {
            trigger_error("KvParser: invalid syntax, expected a '}' on line " . ($i+1) . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
            return null;
        }

        // one level back
        if( $line[0] == "}" ) {
            array_pop($stack);
            continue;
        }

        // nessesary for multiline values
        while(True) {
            preg_match($re_keyvalue, $line, $m);

            if(!$m) {
                trigger_error("KvParser: invalid syntax on line " . ($i+1) . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
                return null;
            }

            $key = (isset($m['key']) && $m['key'] !== "")
                ? $m['key']
                : $m['qkey'];
            $val = (isset($m['qval']) && (!isset($m['vq_end']) || $m['vq_end'] !== ""))
                ? $m['qval']
                : (isset($m['val']) ? $m['val'] : False);

            if($val === False) {
                // chain (merge*) duplicate key
                if(!isset($stack[count($stack)-1][$key])) {
                    $stack[count($stack)-1][$key] = array();
                }
                $stack[count($stack)] = &$stack[count($stack)-1][$key];
                $expect_bracket = true;
            }
            else {
                // if don't match a closing quote for value, we consome one more line, until we find it
                if(!isset($m['vq_end']) && isset($m['qval'])) {
                    $line .= "\n" . $lines[++$i];
                    continue;
                }

                $stack[count($stack)-1][$key] = $val;
            }
            break;
        }
    }

    if(count($stack) !== 1)  {
        trigger_error("KvParser: open parentheses somewhere" . PHP_EOL . 'file: ' . $file, E_USER_NOTICE);
        return null;
    }

    return $arr;
}

set_error_handler('errorHandler');

$listFile = new SplFileObject(__DIR__ . '/CI/KeyValues.list');
$DirsList = [];
$KeyValues = [];

while (!$listFile->eof()) {

    $path = trim($listFile->fgets());
    $ext = pathinfo(__DIR__ . 'KeyValues.php/' . $path, PATHINFO_EXTENSION);
    if ($ext == 'kv' || $ext == 'vdf') {
        // this is kv file
        $KeyValues[] = $path;
    } else {
        // otherwise directory
        $DirsList[] = $path;
    }
}

foreach ($DirsList as $dir) {

    foreach (scandir($dir) as $file) {

        if ($file == '.' || $file == '..') {
            continue;
        }
        $KeyValues[] = $dir . '/' . $file;
    }
}

$validated = 0;
$fieldName = [
    'entities' => [
        'require' => [
            'name', 'shortname', 'buttonclass', 'filtername', 'hasfiltername', 'hammerid', 'mode', 'glow', 'hud', 'autotransfer', 'maxuses', 'cooldown', 'maxamount'
        ],
        'optional' => [
            'startcd', 'triggerid', 'isWall', 'level', 'children'
        ]
    ],
    'Console_T' => [
        'require' => [
            'chi'
        ],
        'optional' => [
            'command', 'blocked'
        ]
    ],
    'BossHP' => [
        'require' => [],
        'optional' => [
            'counter' => [
                'require' => [
                    'iterator'
                ],
                'optional' => [
                    'backup', 'counter', 'displayname', 'countermode', 'multiparts'
                ]
            ],
            'breakable' => [
                'require' => [
                    'targetname'
                ],
                'optional' => [
                    'displayname', 'hpcounts', 'cashonly', 'multiparts'
                ]
            ]
        ]
    ]
];
foreach ($KeyValues as $kv) {

    $local = (__DIR__ . '/' . $kv);
    $array = KvParser($local);

    if (!is_array($array)) {
        trigger_error("Failed to decode file [$kv] -> is_array (Array) return false.", E_USER_NOTICE);
        continue;
    } else if (isset($array['entities'])) {
        parseEntities($local, $array['entities']);
    } else if (isset($array['Console_T'])) {
        parseTranslations($local, $array['Console_T']);
    } else if (isset($array['BossHP'])) {
        parseBossHp($local, $array['BossHP']);
    }

    $validated++;
}

print_r("Validated $validated / " . count($KeyValues) . " KeyValue files." . PHP_EOL);
exit(0);