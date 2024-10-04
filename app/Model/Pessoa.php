<?php

namespace App\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Pessoa
{
    #[Id]
    #[Column]
    #[GeneratedValue]
    private int $id;

    #[Column]
    private string $nome;

    #[Column(unique: true)]
    private string $cpf;

    #[OneToMany(targetEntity: Contato::class, mappedBy: 'pessoa')]
    private Collection $contatos;

    public function __construct(

    ) {
        $this->contatos = new ArrayCollection();
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    // Setters
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function addContato(Contato $contato): void
    {
        $this->contatos->add($contato);
        $contato->setPessoa($this);
    }

    public function contatos():iterable {
        return $this->contatos;
    }

}