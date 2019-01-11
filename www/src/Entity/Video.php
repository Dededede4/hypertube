<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
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
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $torrentUrl;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbDownload;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbSeeder;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbLeecher;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $productionDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pictureUrl;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $notation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $downloadStartedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $downloadFinishAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $downloadBytesDone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbSee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $genre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $casting;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastSeeAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uuid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTorrentUrl(): ?string
    {
        return $this->torrentUrl;
    }

    public function setTorrentUrl(string $torrentUrl): self
    {
        $this->torrentUrl = $torrentUrl;

        return $this;
    }

    public function getNbDownload(): ?int
    {
        return $this->nbDownload;
    }

    public function setNbDownload(int $nbDownload): self
    {
        $this->nbDownload = $nbDownload;

        return $this;
    }

    public function getNbSeeder(): ?int
    {
        return $this->nbSeeder;
    }

    public function setNbSeeder(int $nbSeeder): self
    {
        $this->nbSeeder = $nbSeeder;

        return $this;
    }

    public function getProductionDate(): ?\DateTimeInterface
    {
        return $this->productionDate;
    }

    public function setProductionDate(?\DateTimeInterface $productionDate): self
    {
        $this->productionDate = $productionDate;

        return $this;
    }

    public function getPictureUrl(): ?string
    {
        return $this->pictureUrl;
    }

    public function setPictureUrl(?string $pictureUrl): self
    {
        $this->pictureUrl = $pictureUrl;

        return $this;
    }

    public function getNotation(): ?int
    {
        return $this->notation;
    }

    public function setNotation(?int $notation): self
    {
        $this->notation = $notation;

        return $this;
    }

    public function getDownloadStartedAt(): ?\DateTimeInterface
    {
        return $this->downloadStartedAt;
    }

    public function setDownloadStartedAt(?\DateTimeInterface $downloadStartedAt): self
    {
        $this->downloadStartedAt = $downloadStartedAt;

        return $this;
    }

    public function getDownloadFinishAt(): ?\DateTimeInterface
    {
        return $this->downloadFinishAt;
    }

    public function setDownloadFinishAt(?\DateTimeInterface $downloadFinishAt): self
    {
        $this->downloadFinishAt = $downloadFinishAt;

        return $this;
    }

    public function getDownloadBytesDone(): ?int
    {
        return $this->downloadBytesDone;
    }

    public function setDownloadBytesDone(?int $downloadBytesDone): self
    {
        $this->downloadBytesDone = $downloadBytesDone;

        return $this;
    }

    public function getNbSee(): ?int
    {
        return $this->nbSee;
    }

    public function setNbSee(int $nbSee): self
    {
        $this->nbSee = $nbSee;

        return $this;
    }

    public function getGenre(): ?int
    {
        return $this->genre;
    }

    public function setGenre(?int $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCasting(): ?string
    {
        return $this->casting;
    }

    public function setCasting(?string $casting): self
    {
        $this->casting = $casting;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getLastSeeAt(): ?\DateTimeInterface
    {
        return $this->lastSeeAt;
    }

    public function setLastSeeAt(?\DateTimeInterface $lastSeeAt): self
    {
        $this->lastSeeAt = $lastSeeAt;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getNbLeecher(): ?int
    {
        return $this->nbLeecher;
    }

    public function setNbLeecher(?int $nbLeecher): self
    {
        $this->nbLeecher = $nbLeecher;

        return $this;
    }
}
