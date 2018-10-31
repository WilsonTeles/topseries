<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function __construct() {
        parent::__construct();
       
    }

    /**
     * Verifica se a data informada está na estrutura correta do calendário
     * gregoriano.
     *
     * @param String $date Uma string contendo a data no formato dd/mm/yyyy
     * @return boolean
     */
    public function valid_date($date) {
        $CI = & get_instance();
        $CI->form_validation->set_message('valid_date', 'A %s informada não é válida.');
        $data = explode("/", "$date"); // fatia a string $dat em pedados, usando / como referência
        $d = $data[0];
        $m = $data[1];
        $y = $data[2];

        // verifica se a data é válida!
        // 1 = true (válida)
        // 0 = false (inválida)
        $res = checkdate($m, $d, $y);
        if ($res == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * valid_cpf
     *
     * Verifica CPF é válido
     * @access public
     * @param string
     * @return bool
     */
    function valid_cpf($cpf) {
        $CI = & get_instance();
        $CI->form_validation->set_message('valid_cpf', 'O %s informado não é válido.');

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            return FALSE;
        } else { // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return FALSE;
                }
            }
            return TRUE;
        }
    }


    

}
