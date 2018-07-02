<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartnerRepository")
 * @ORM\Table(name="partners")
 */
class Partner
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
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", length=1)
     */
    private $status;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $created_at;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $created_by;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     *
     */
    private $updated_at;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deleted_at;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deleted_by;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Partner
     */
    public function setName(string $name): Partner
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Partner
     */
    public function setSlug(string $slug): Partner
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Partner
     */
    public function setImage(string $image): Partner
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Partner
     */
    public function setType(string $type): Partner
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return Partner
     */
    public function setStatus(bool $status): Partner
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     * @return Partner
     */
    public function setCreatedAt(\DateTime $created_at): Partner
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedBy(): \DateTime
    {
        return $this->created_by;
    }

    /**
     * @param \DateTime $created_by
     * @return Partner
     */
    public function setCreatedBy(\DateTime $created_by): Partner
    {
        $this->created_by = $created_by;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime $updated_at
     * @return Partner
     */
    public function setUpdatedAt(\DateTime $updated_at): Partner
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt(): \DateTime
    {
        return $this->deleted_at;
    }

    /**
     * @param \DateTime $deletet_at
     * @return Partner
     */
    public function setDeletedAt(\DateTime $deleted_at): Partner
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedBy(): \DateTime
    {
        return $this->deleted_by;
    }

    /**
     * @param \DateTime $deleted_by
     * @return Partner
     */
    public function setDeletedBy(\DateTime $deleted_by): Partner
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }
}
