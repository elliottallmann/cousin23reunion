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
    protected $id;
    protected $name;
    protected $location;
    protected $description;
    protected $link;
    protected $date;
    protected $authorId;
    protected $valid;

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

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function setValid(bool $valid): void
    {
        $this->valid = $valid;
    }

    public function getVisible(): string
    {
        return $this->valid;
    }

    public function rsvps()
    {
        return $this->hasMany('App\RSVP', "eventId", "id");
    }
}
