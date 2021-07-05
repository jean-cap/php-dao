<?php


class Usuario
{
    private string $idusuario;
    private string $deslogin;
    private string $dessenha;
    private DateTime $dtcadastro;

    public static function getList()
    {
        $sql = new Sql();
        return $sql->select('SELECT * FROM tb_usuarios ORDER BY deslogin');
    }

    public static function search($login)
    {
        $sql = new Sql();
        return $sql->select('SELECT * FROM tb_usuarios WHERE deslogin LIKE :LOGIN ORDER BY deslogin', array(':LOGIN' => '%' . $login . '%'));
    }

    public function loadById(int $id): void
    {
        $sql = new Sql();
        $resultado = $sql->select('SELECT * FROM tb_usuarios WHERE idusuario = :ID', array(':ID' => $id));

        if (isset($resultado[0])) {
            $row = $resultado[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        }
    }

    public function login($login, $password)
    {
        $sql = new Sql();
        $resultado = $sql->select('SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD', array(
            ':LOGIN' => $login,
            ':PASSWORD' => $password
        ));

        if (isset($resultado[0])) {
            $row = $resultado[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));
        } else {
            throw new Exception('Login ou senha inválidos!');
        }
    }

    public function __toString()
    {
        return json_encode(array(
            'idusuario' => $this->getIdusuario(),
            'deslogin' => $this->getDeslogin(),
            'dessenha' => $this->getDessenha(),
            'dtcadastro' => $this->getDtcadastro()->format('d/m/Y H:i:s')
        ));
    }

    /**
     * @return string
     */
    public function getIdusuario(): string
    {
        return $this->idusuario;
    }

    /**
     * @param string $idusuario
     */
    public function setIdusuario(string $idusuario): void
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @return string
     */
    public function getDeslogin(): string
    {
        return $this->deslogin;
    }

    /**
     * @param string $deslogin
     */
    public function setDeslogin(string $deslogin): void
    {
        $this->deslogin = $deslogin;
    }

    /**
     * @return string
     */
    public function getDessenha(): string
    {
        return $this->dessenha;
    }

    /**
     * @param string $dessenha
     */
    public function setDessenha(string $dessenha): void
    {
        $this->dessenha = $dessenha;
    }

    /**
     * @return DateTime
     */
    public function getDtcadastro(): DateTime
    {
        return $this->dtcadastro;
    }

    /**
     * @param DateTime $dtcadastro
     */
    public function setDtcadastro(DateTime $dtcadastro): void
    {
        $this->dtcadastro = $dtcadastro;
    }
}