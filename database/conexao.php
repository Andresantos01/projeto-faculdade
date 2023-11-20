<?php

class ConexaoMySQL
{       
    private  $db_name = 'api';
    private  $db_host = 'localhost';
    private  $db_user = 'root';
    private  $db_pass = 'Edinarda100%';

    /* -------------------------------------------------------------------------- */
    /*                                   CONEXAO                                  */
    /* -------------------------------------------------------------------------- */
    public function conexao()
    {
       /* ---------------------------- Conexao com banco mysqli --------------------------- */
        try {
            $conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

           /* ----------------------- verifica se deu algum error ---------------------- */
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }
            
            /* ------------- garante que o banco receba caracteres especiais ------------ */
            $conn->set_charset("utf8"); 
            /* ---------------------------- retorna a coexao ---------------------------- */
            return $conn;
        } catch (Exception $e) {
           /* --------------------- printa o erro caso tenha algum --------------------- */
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}