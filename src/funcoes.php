<?php

namespace SRC;

class Funcoes
{

    public function SeculoAno(int $ano): string
    {

        $seculo = 0;

        $divisão = $ano / 100;

        if ($ano % 100 == 0) {

            $seculo = $divisão;
        } else {
            $seculo = $divisão + 1;
        }

        return floor($seculo);
    }

    // Função para verificar se é número primo
    public function NumeroPrimo(int $numero): bool
    {
        // Verifica se o número passado pode ser dividido por algum dos números dentro do intervalo 2 -> $numero.
        for ($i = 2; $i < $numero; $i++) {
            if ($numero % $i == 0) {
                return false;
            }
        }

        return true;
    }

    public function PrimoAnterior(int $numero): int
    {

        for ($i = $numero - 1; $i > 0; $i--) {
            if ($this->NumeroPrimo($i) == true) {
                return $i;
            }
        }

        return "Nenhum número primo encontrado";
    }


    public function SegundoMaior(array $arr): int
    {
        $maior = 0;
        $segMaior = 0;
        $comparador = 0;

        foreach ($arr as $array) {
            $comparador = max($array);

            if ($comparador >= $maior) {
                $segMaior = $maior;
                $maior = $comparador;
            } elseif ($comparador >= $segMaior) {
                $segMaior = $comparador;
            }
        }

        return $segMaior;
    }

    //função para validar sequência
    public function validaSequencia($array)
    {

        $i = 1;
        $sequencia = true;

        while ($i < sizeof($array) and $sequencia == 1) {

            if ($array[$i] > $array[$i - 1])
                $i++;
            else
                $sequencia = false;
        }

        //retorna 1 caso o array for sequência e 0 caso não seja
        return $sequencia;
    }

    public function sequenciaCrescente($array)
    {

        $i = 0;
        $arrayCopy = $array;

        //flag que para o laço se identificar que o array é uma sequência
        $parou = 0;

        while ($i <= sizeof($array) and $parou == 0) {

            if ($this->validaSequencia($arrayCopy) == true) {
                $parou = 1;
            } else //se não for sequência, vai remover posição por posição para identificar se pode ser sequência
            {
                //como só pode remover 1 posição, o array é restaurado ao original
                $arrayCopy = $array;

                //removendo posição $i
                unset($arrayCopy[$i]);

                //reajustando o índice
                $arrayCopy = array_values($arrayCopy);
                $i++;
            }
        }

        //caso a flag $parou seja 1, a sequêcia retorna TRUE, se não, FALSE
        if ($parou == 1) {
            echo "TRUE\n";
            $retorno = TRUE;
        } else {
            echo "FALSE\n";
            $retorno = FALSE;
        }

        return $retorno;
    }
}
