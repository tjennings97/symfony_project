//src/Entity/Class.php
namespace App\Entity;

class Class
{
    protected $Code;
    protected $Section;
    protected $Professor;
    protected $Days;
    protected $Time;
    protected $Location;
    protected $Title;

    public function getCode()
    {
        return $this->Code;
    }

    public function getSection()
    {
        return $this->Section;
    }

    public function getProfessor()
    {
        return $this->Professor;
    }

    public function getDays()
    {
        return $this->Days;
    }

    public function getTime()
    {
        return $this->Time;
    }

    public function getLocation()
    {
        return $this->Location;
    }

    public function getTitle()
    {
        return $this->Title;
    }

    public function setCode($Code)
    {
        $this->Code = $Code;
    }

    public function setSeciont($Section)
    {
        $this->Section = $Section;
    }

    public function setProfessor($Professor)
    {
        $this->Professor = $Professor;
    }

    public function setDays($Days)
    {
        $this->Days = $Days;
    }

    public function setTime($Time)
    {
        $this->Time = $Time;
    }

    public function setLocation($Location)
    {
        $this->Location = $Location;
    }

    public function setTitle($Title)
    {
        $this->Title = $Title;
    }
}
