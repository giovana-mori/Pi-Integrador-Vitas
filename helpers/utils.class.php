<?php

class Utils
{
    public static function loadEnv($path)
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException(sprintf('%s file does not exist', $path));
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            if (!array_key_exists($key, $_SERVER) && !array_key_exists($key, $_ENV)) {
                putenv(sprintf('%s=%s', $key, $value));
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            }
        }
    }
    //load estados
    public static function loadEstados()
    {
        //load json from static/data/estados.json
        $json = file_get_contents('static/data/estados.json');
        $estados = json_decode($json, true);
        usort($estados, function ($a, $b) {
            return strcmp($a['nome'], $b['nome']);
        });
        // return array
        return $estados;
    }

    public static function base_url($path = null)
    {
        if ($path) {
            return getenv('BASE_PATH') . '/' . $path;
        }

        return getenv('BASE_PATH');
    }
}
