<?php
require 'interfaces.php';
class Teacher{
    private string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
    public function getName(): string{
        return "<br/> teacher name: " . $this->name;
    }
    public function generator($from = 0, $to = 10){
        for($i = $from; $i <= $to; $i++){
            echo "num is : ";
            yield $i . "<br/>";
        }
    }
}
class Car{
    public string $name ;
    public string $type;
    public function __construct(string $name, string $type){
        $this->name = $name;
        $this->type = $type;
    }

    public function getName(): string{
        return $this->name;
    }
    public function getType(): string{
        return $this->type;
    }
}
class CustomCar extends Car
{
    public string $color;

    public function __construct(string $name, string $color, string $type)
    {
        parent::__construct(basename($name), basename($type));
        $this->color = $color;
    }

    public function getCar(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'color' => $this->color
        ];
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    final public function Type(): string
    {
        return parent::getType();
    }
}

class Users implements UserInterface
{
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $name, string $email, string $password){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    public function getName(): string{
        return "<br/> user name: " . $this->name;
    }
    public function getEmail(): string{
        return "<br/> user email: " . $this->email;
    }
    public function getPassword(): string{
        return "<br/> user password: " . $this->password;
    }
}