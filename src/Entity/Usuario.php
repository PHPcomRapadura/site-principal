<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var array
     * @ORM\Column(type="json")
     */
    private $grupo;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $avatar;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $token;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $sessao;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $status;

    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     */
    private $criado_em;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $criado_por;

    /**
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $atualizado_em;

    /**
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $removido_em;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $removido_por;

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @var string
     */
    public function getUsername()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @var string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @var array
     */
    public function getRoles()
    {
        return $this->grupo;
    }

    public function setGrupo($grupo)
    {
        $this->grupo[] = $grupo;
    }

    public function getGrupo()
    {
        return $this->grupo;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setSessao($sessao)
    {
        $this->sessao = $sessao;
    }

    public function getSessao()
    {
        return $this->sessao;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setCriadoEm($criado_em)
    {
        $this->criado_em = $criado_em;
    }

    public function getCriadoEm()
    {
        return $this->criado_em;
    }

    public function setCriadoPor($criado_por)
    {
        $this->criado_por = $criado_por;
    }

    public function getCriadoPor()
    {
        return $this->criado_por;
    }

    public function setAtualizadoEm($atualizado_em)
    {
        $this->atualizado_em = $atualizado_em;
    }

    public function getAtualizadoEm()
    {
        return $this->atualizado_em;
    }

    public function setRemovidoEm($removido_em)
    {
        $this->removido_em = $removido_em;
    }

    public function getRemovidoEm()
    {
        return $this->removido_em;
    }

    public function setRemovidoPor($removido_por)
    {
        $this->removido_por = $removido_por;
    }

    public function getRemovidoPor()
    {
        return $this->removido_por;
    }

    /**
     * @var string\null
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * implements
     */
    public function eraseCredentials()
    {
        return null;
    }
}
