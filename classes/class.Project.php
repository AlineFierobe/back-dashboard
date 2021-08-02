<?php
class Project implements JsonSerializable 
{
    private $id = 0;
    private $name = null;
    private $description = null;
    private $deadline = null;

    private $type = 0;
    private $status = 0;
    
    // CONSTRUCTOR
    function __construct($id, $name, $description, $deadline) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->deadline = $deadline;
    }
    
    // GETTER
    function getId() {                  return $this->id;}
    function getName() {                return $this->name;}
    function getDescription() {         return $this->description;}
    function getDeadline() {            return $this->deadline;}

    function getType() {                return $this->type;}
    function getStatus() {              return $this->status;}
    
    // SETTER
    function setId($id): void {                             $this->id = $id;}
    function setName($name): void {                         $this->name = $name;}
    function setDescription($description): void {           $this->description = $description;}
    function setDeadline($deadline): void {                 $this->deadline = $deadline;}
    
    function setType($type): void {                         $this->type = $type;}
    function setStatus($status): void {                     $this->status = $status;}


    public function jsonSerialize(){ return get_object_vars($this); }
}
?>