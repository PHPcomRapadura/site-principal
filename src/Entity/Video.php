<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 * @ORM\Table(name="videos")
 */
class Video
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=60)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string", length=60)
     * @Gedmo\Slug(fields={"title"}, updatable=true)
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $incorporation_code;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $created_at;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="created_by", nullable=false)
     */
    private $createdBy;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated_at;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $deleted_at;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="deleted_by")
     */
    private $deleted_by;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Video
     */
    public function setTitle(string $title): Video
    {
        $this->title = $title;
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
     * @return Video
     */
    public function setSlug(string $slug): Video
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Video
     */
    public function setDescription(string $description): Video
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getIncorporationCode(): string
    {
        return $this->incorporation_code;
    }

    /**
     * @param string $incorporation_code
     * @return Video
     */
    public function setIncorporationCode(string $incorporation_code): Video
    {
        $this->incorporation_code = $incorporation_code;
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
     * @return Video
     */
    public function setStatus(bool $status): Video
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
     * @return Video
     */
    public function setCreatedAt(\DateTime $created_at): Video
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return User
     */
    public function getCreatedBy(): User
    {
        return $this->createdBy;
    }

    /**
     * @param User $createdBy
     * @return Video
     */
    public function setCreatedBy(User $createdBy): Video
    {
        $this->createdBy = $createdBy;
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
     * @return Video
     */
    public function setUpdatedAt(\DateTime $updated_at): Video
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
     * @param \DateTime $deleted_at
     * @return Video
     */
    public function setDeletedAt(\DateTime $deleted_at): Video
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    /**
     * @return User
     */
    public function getDeletedBy(): User
    {
        return $this->deleted_by;
    }

    /**
     * @param User $deleted_by
     * @return Video
     */
    public function setDeletedBy(User $deleted_by): Video
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }
}
