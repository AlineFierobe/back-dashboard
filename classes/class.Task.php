<?php
class Task implements JsonSerializable 
{
    private $id = 0;
    private $name = null;
    private $deadline = null;
    private $description = null;

    private $type = 0;
    private $project = 0;
    private $status = 0;
    
    // CONSTRUCTOR
    function __construct($id, $name, $deadline, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->deadline = $deadline;
        $this->description = $description;
    }
    
    // GETTER
    function getId() {                  return $this->id;}
    function getName() {                return $this->name;}
    function getDeadline() {            return $this->deadline;}
    function getDescription() {         return $this->description;}

    function getType() {                return $this->type;}
    function getProject() {             return $this->project;}
    function getStatus() {              return $this->status;}
    
    // SETTER
    function setId($id): void {                             $this->id = $id;}
    function setName($name): void {                         $this->name = $name;}
    function setDate($deadline): void {                     $this->deadline = $deadline;}
    function setDescription($description): void {           $this->description = $description;}

    function setType($type): void {                         $this->type = $type;}
    function setProject($project): void {                   $this->project = $project;}
    function setStatus($status): void {                     $this->status = $status;}


    public function jsonSerialize(){ return get_object_vars($this); }
}
?>