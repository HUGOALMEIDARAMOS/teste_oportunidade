<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 07/07/18
 * Time: 21:38
 */

class usuario
{
    private $us_Code;
    private $us_Nome;
    private $us_Email;
    private $us_DataNasci;
    private $us_Cpf;
    private $us_Senha;
    private $us_Foto;
    private $us_Ip;

    /**
     * @return mixed
     */
    public function getUsCode()
    {
        return $this->us_Code;
    }

    /**
     * @param mixed $us_Code
     */
    public function setUsCode($us_Code)
    {
        $this->us_Code = $us_Code;
    }

    /**
     * @return mixed
     */
    public function getUsNome()
    {
        return $this->us_Nome;
    }

    /**
     * @param mixed $us_Nome
     */
    public function setUsNome($us_Nome)
    {
        $this->us_Nome = $us_Nome;
    }

    /**
     * @return mixed
     */
    public function getUsEmail()
    {
        return $this->us_Email;
    }

    /**
     * @param mixed $us_Email
     */
    public function setUsEmail($us_Email)
    {
        $this->us_Email = $us_Email;
    }

    /**
     * @return mixed
     */
    public function getUsCpf()
    {
        return $this->us_Cpf;
    }

    /**
     * @param mixed $us_Cpf
     */
    public function setUsCpf($us_Cpf)
    {
        $this->us_Cpf = $us_Cpf;
    }

    /**
     * @return mixed
     */
    public function getUsDataNasci()
    {
        return $this->us_DataNasci;
    }

    /**
     * @param mixed $us_DataNasci
     */
    public function setUsDataNasci($us_DataNasci)
    {
        $this->us_DataNasci = $us_DataNasci;
    }

    /**
     * @return mixed
     */
    public function getUsSenha()
    {
        return $this->us_Senha;
    }

    /**
     * @param mixed $us_Senha
     */
    public function setUsSenha($us_Senha)
    {
        $this->us_Senha = $us_Senha;
    }

    /**
     * @return mixed
     */
    public function getUsFoto()
    {
        return $this->us_Foto;
    }

    /**
     * @param mixed $us_Foto
     */
    public function setUsFoto($us_Foto)
    {
        $this->us_Foto = $us_Foto;
    }

    /**
     * @return mixed
     */
    public function getUsIp()
    {
        return $this->us_Ip;
    }

    /**
     * @param mixed $us_Ip
     */
    public function setUsIp($us_Ip)
    {
        $this->us_Ip = $us_Ip;
    }




}
