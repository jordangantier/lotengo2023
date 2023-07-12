<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Boleto;

class BoletoSeeder extends Seeder
{
    public function run()
    {
        //Variables de configuración del tipo de juego.
        $qty_numeros = env('QTY_NUMEROS');
        $qty_boletos = env('QTY_BOLETOS');
        $qty_jugadas = env('QTY_JUGADAS');
        $qty_series = env('QTY_SERIES');
        $chars_boletos = strlen($qty_boletos);

        $modulo = $qty_boletos % $qty_series;
        $boletos_x_serie = ($qty_boletos - $modulo) / $qty_series;
        $emitibles = $boletos_x_serie * $qty_series;

        $ciphering = env('CIPHERING');
        $iv_length = openssl_cipher_iv_length($ciphering);
        $encryption_iv = env('ENCRYPTION_IV');
        $encryption_key = env('ENCRYPTION_KEY');

        //Genera el array de números sorteables.
        $boletos = range(1, $qty_numeros);

        //Genera los boletos
        for ($i = 1; $i <= $qty_boletos; $i++) {

            //Coloca los boletos en su determinado concurso.
            if ($i >= 1 && $i <= 3000) {
                $concurso = 1;
            }
            if ($i >= 3001 && $i <= 6000) {
                $concurso = 2;
            }
            if ($i >= 6001 && $i <= 9000) {
                $concurso = 3;
            }
            if ($i >= 9001 && $i <= 12000) {
                $concurso = 4;
            }

            // Crea los arrays de boletos.
            $ordhasher = '';
            $unordhasher = '';
            for ($n = 1; $n <= $qty_jugadas; $n++) {

                // Selecciona los bolillos para la jugada.
                $numeros[$n] = array_rand($boletos, 15);

                // Guarda los números ordenados.
                $ordhasher .= join($numeros[$n]);

                // Baraja los números.
                for ($x = 1; $x <= 5; $x++) {
                    shuffle($numeros[$n]);
                }

                // Genera el hasher con los números elegidos.
                $unordhasher .= join($numeros[$n]);
            }

            // Genera el json con todos los números.
            $array_numeros = json_encode($numeros);

            // Generación de Hash.
            $hash = openssl_encrypt($unordhasher, $ciphering, $encryption_key, $iv_length, $encryption_iv);
            $md5hash = strtoupper(md5($hash));
            //$decrypted = openssl_decrypt($hash, $ciphering, $encryption_key, 0, $encryption_iv);
            $z = str_pad($i, $chars_boletos, '0', STR_PAD_LEFT);
            Boleto::create([
                'concurso' => $concurso,
                'serie' => $z,
                'hash' => $hash,
                'hasher' => $unordhasher,
                'hasher2' => $ordhasher,
                'md5hash' => $md5hash,
                'numeros' => $array_numeros,
            ]);
        }
    }
}
