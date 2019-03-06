<?php
declare(strict_types=1);
namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * @property string $name
 * @property string $location
 * @property string $description
 * @property string $link
 * @property Date $date
 * @property unsignedInteger $author_id
 * @property boolean $approved
 * @property boolean $visible
 */
class Event extends Model
{
    protected $table = "events";
    protected $name;
    protected $location;
    protected $description;
    protected $link;
    protected $date;
    protected $author_id;
    protected $approved;
    protected $visible;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setAuthorId(int $author_id): void
    {
        $this->author_id = $author_id;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function setVisible(bool $visible): void
    {
        $this->visible = $visible;
    }

    public function getVisible(): string
    {
        return $this->visible;
    }
}
