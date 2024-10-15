<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contacts") // Tabela deve ser minúscula
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="id_contact")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", name="type_contact")
     */
    private $typeContact;

    /**
     * @ORM\Column(type="string", length=100, name="desc_contact")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="contacts")
     * @ORM\JoinColumn(name="fk_owner", referencedColumnName="id", nullable=false)
     */
    private $owner;

    // Getters e Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): bool
    {
        return $this->typeContact;
    }

    public function setType(bool $type): void
    {
        $this->typeContact = $type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getOwner(): ?User // Use nullable para maior segurança
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): void // Use nullable para maior segurança
    {
        $this->owner = $owner;
    }
}
