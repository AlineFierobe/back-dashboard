<?php
class TypeProject implements JsonSerializable 
{
    private $id = 0;
    private $name = null;
    
    // CONSTRUCTOR
    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    
    // GETTER
    function getId() {              return $this->id;}
    function getName() {            return $this->name;}
    
    // SETTER
    function setId($id): void {                     $this->id = $id;}
    function setName($name): void {                 $this->name = $name;}


    public function jsonSerialize(){ return get_object_vars($this); }
}
?>