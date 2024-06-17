<?php

class ClinicaDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function alterar($clinica)
    {
        $sql = "UPDATE clinica SET nome = ?, cnpj = ?, inscricao_estadual = ?, logo = ?, cep = ?, logradouro = ?, bairro = ?, estado = ?, cidade = ?, segunda = ?, terca = ?, quarta = ?, quinta = ?, sexta = ?, sabado = ?, domingo = ?, feriados = ?, email = ?, telefone = ?, whatsapp = ? WHERE id_clinica = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $clinica->getNome());
            $stm->bindValue(2, $clinica->getCnpj());
            $stm->bindValue(3, $clinica->getInscricaoEstadual());
            $stm->bindValue(4, $clinica->getLogo());
            $stm->bindValue(5, $clinica->getCep());
            $stm->bindValue(6, $clinica->getLogradouro());
            $stm->bindValue(7, $clinica->getBairro());
            $stm->bindValue(8, $clinica->getEstado());
            $stm->bindValue(9, $clinica->getCidade());
            $stm->bindValue(10, $clinica->getSegunda());
            $stm->bindValue(11, $clinica->getTerca());
            $stm->bindValue(12, $clinica->getQuarta());
            $stm->bindValue(13, $clinica->getQuinta());
            $stm->bindValue(14, $clinica->getSexta());
            $stm->bindValue(15, $clinica->getSabado());
            $stm->bindValue(16, $clinica->getDomingo());
            $stm->bindValue(17, $clinica->getFeriados());
            $stm->bindValue(18, $clinica->getEmail());
            $stm->bindValue(19, $clinica->getTelefone());
            $stm->bindValue(20, $clinica->getWhatsapp());
            $stm->bindValue(21, $clinica->getIdClinica());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateAvatar($id_clinica, $urlImage)
    {
        $sql = "UPDATE clinica SET logo = ? WHERE id_clinica = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $urlImage);
            $stm->bindValue(2, $id_clinica);
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateLogo($id_clinica, $urlImage)
    {
        $sql = "UPDATE clinica SET logo = ? WHERE id_clinica = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $urlImage);
            $stm->bindValue(2, $id_clinica);
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function buscarID($id)
    {
        $sql = "SELECT * FROM clinica WHERE id_clinica = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $this->db = null;
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    public function buscar()
    {
        $sql = "SELECT * FROM clinica limit 1";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
