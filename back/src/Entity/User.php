<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource()]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'idUser', targetEntity: Folder::class, orphanRemoval: true)]
    private Collection $folders;

    #[ORM\OneToOne(mappedBy: 'idUser', cascade: ['persist', 'remove'])]
    private ?Database $idDatabase = null;

    #[ORM\Column(length: 255, unique: true, nullable: true)]
    private ?string $projectName ;

    #[ORM\Column(length: 255, unique: true, nullable: true)]
    private ?string $domainName ;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vmUsername = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vmPassword = null;

    public function __construct()
    {
        $this->folders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Folder>
     */
    public function getFolders(): Collection
    {
        return $this->folders;
    }

    public function addFolder(Folder $folder): self
    {
        if (!$this->folders->contains($folder)) {
            $this->folders->add($folder);
            $folder->setIdUser($this);
        }

        return $this;
    }

    public function removeFolder(Folder $folder): self
    {
        if ($this->folders->removeElement($folder)) {
            // set the owning side to null (unless already changed)
            if ($folder->getIdUser() === $this) {
                $folder->setIdUser(null);
            }
        }

        return $this;
    }

    public function getIdDatabase(): ?Database
    {
        return $this->idDatabase;
    }

    public function setIdDatabase(?Database $idDatabase): self
    {
        // unset the owning side of the relation if necessary
        if ($idDatabase === null && $this->idDatabase !== null) {
            $this->idDatabase->setIdUser(null);
        }

        // set the owning side of the relation if necessary
        if ($idDatabase !== null && $idDatabase->getIdUser() !== $this) {
            $idDatabase->setIdUser($this);
        }

        $this->idDatabase = $idDatabase;

        return $this;
    }

    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }

    public function getDomainName(): ?string
    {
        return $this->domainName;
    }

    public function setDomainName(string $domainName): self
    {
        $this->domainName = $domainName;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->pseudo;
    }


    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getVmUsername(): ?string
    {
        return $this->vmUsername;
    }

    public function setVmUsername(?string $vmUsername): self
    {
        $this->vmUsername = $vmUsername;

        return $this;
    }

    public function getVmPassword(): ?string
    {
        return $this->vmPassword;
    }

    public function setVmPassword(?string $vmPassword): self
    {
        $this->vmPassword = $vmPassword;

        return $this;
    }
}
