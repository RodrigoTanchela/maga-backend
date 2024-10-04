<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Contato
{
    #[Id]
    #[Column]
    #[GeneratedValue]
    private int $id;

    #[Column(type: "boolean")]
    private bool $tipo; // true para Telefone, false para Email

    #[Column(type: "string")]
    private string $descricao;

    #[ManyToOne(targetEntity: Pessoa::class, inversedBy: 'contatos')]
    private Pessoa $pessoa; // Referência à Pessoa

    public function __construct(bool $tipo, string $descricao)
    {
        $this->tipo = $tipo;
        $this->descricao = $descricao;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getTipo(): bool
    {
        return $this->tipo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getPessoa(): Pessoa
    {
        return $this->pessoa;
    }

    // Setters
    public function setTipo(bool $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setPessoa(Pessoa $pessoa): void
    {
        $this->pessoa = $pessoa;
    }
}
