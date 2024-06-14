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

    public static function splitHourClinica($dataClinica)
    {
        if ($dataClinica == null || !isset($dataClinica) || empty($dataClinica)) {
            return null;
        }
        //As dataClinica vem no formato 08:00|12:00;12:00|13:00;13:00|17:00
        $horarios = explode(';', $dataClinica);
        $horarios = array_map(function ($h) {
            return explode('|', $h);
        }, $horarios);
        //return array
        return $horarios;
    }

    public static function loadCidades($estado)
    {
        $json = file_get_contents('static/data/estados-cidades.json');
        $cidades = json_decode($json, true);
        $cidades = array_filter($cidades['estados'], function ($cidade) use ($estado) {
            return strtolower($cidade['sigla']) == strtolower($estado);
        });

        usort($cidades, function ($a, $b) {
            return strcmp($a['nome'], $b['nome']);
        });

        //return object
        return isset($cidades[0]) ? $cidades[0] : $cidades;
    }

    public static function formatarData($data)
    {
        $data = new DateTime($data);
        return (string)$data->format('d/m/Y');
    }

    public static function base_url($path = null)
    {
        if ($path) {
            return getenv('BASE_PATH') . '/' . $path;
        }

        return getenv('BASE_PATH');
    }

    public static function generateHorariosDisponiveis($horaInicio, $horaFim, $duracao)
    {
        $horarios = [];

        $start = new DateTime($horaInicio);
        $end = new DateTime($horaFim);

        while ($start < $end) {
            $horarioInicio = $start->format('H:i:s');
            $start->add(new DateInterval('PT' . $duracao . 'M'));
            if ($start > $end) {
                break;
            }
            $horarioFim = $start->format('H:i:s');
            $horarios[] = ['inicio' => $horarioInicio, 'fim' => $horarioFim];
        }

        return $horarios;
    }

    public static function generateHorariosDisponiveis_($horaInicio, $horaFim, $duracao)
    {
        $horarios = [];
        $inicio = strtotime($horaInicio);
        $fim = strtotime($horaFim);

        while ($inicio < $fim) {
            $horarios[] = date('H:i', $inicio);
            $inicio = strtotime("+$duracao minutes", $inicio);
        }

        return $horarios;
    }

    public static function getDiasSemanaDisponiveis($ano, $mes, $diasSemanaDisponiveis) {
        $diasDisponiveis = [];
        $diasSemana = ['domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado'];
        
        $quantidadeDias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

        for ($dia = 1; $dia <= $quantidadeDias; $dia++) {
            $timestamp = mktime(0, 0, 0, $mes, $dia, $ano);
            $diaSemana = date('w', $timestamp); // 0 (para domingo) até 6 (para sábado)
            $nomeDiaSemana = $diasSemana[$diaSemana];

            if (in_array($nomeDiaSemana, $diasSemanaDisponiveis)) {
                $diasDisponiveis[] = [
                    'data' => date('Y-m-d', $timestamp),
                    'diaSemana' => $nomeDiaSemana
                ];
            }
        }

        return $diasDisponiveis;
    }
}
