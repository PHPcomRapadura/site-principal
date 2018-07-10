<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 1,
     *      max = 60,
     *      minMessage = "Título deve ter pelo menos {{ limit }} caracteres.",
     *      maxMessage = "Título deve ter no máximo {{ limit }} caracteres."
     * )
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
     * @Assert\NotBlank()
     */
    private $incorporation_code;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", options={"default": 1})
     * @Assert\NotBlank()
     */
    private $status = true;

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
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $updated_at;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle():? string
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
    public function getSlug():? string
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
    public function getDescription():? string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Video
     */
    public function setDescription(?string $description): Video
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getIncorporationCode():? string
    {
        return stripslashes($this->incorporation_code);
    }

    /**
     * @param string $incorporation_code
     * @return Video
     */
    public function setIncorporationCode(?string $incorporation_code): Video
    {
        $this->incorporation_code = addslashes($incorporation_code);
        return $this;
    }

    /**
     * @return bool
     */
    public function isStatus():? bool
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
    public function getCreatedAt():? \DateTime
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
    public function getCreatedBy():? User
    {
        return $this->createdBy;
    }

    /**
     * @param UserInterface $createdBy
     * @return Video
     */
    public function setCreatedBy(UserInterface $createdBy): Video
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt():? \DateTime
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
}
