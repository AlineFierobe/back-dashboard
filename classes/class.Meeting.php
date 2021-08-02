<?php
class Meeting implements JsonSerializable 
{
    private $id = 0;
    private $name = null;
    private $date = null;
    private $time = null;
    private $description = null;
    private $more = null;
    private $report = null;

    private $type = 0;
    private $project = 0;
    private $status = 0;
    
    // CONSTRUCTOR
    function __construct($id, $name, $date, $time, $description, $more, $report) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->time = $time;
        $this->description = $description;
        $this->more = $more;
        $this->report = $report;
    }
    
    // GETTER
    function getId() {                  return $this->id;}
    function getName() {                return $this->name;}
    function getDate() {                return $this->date;}
    function getTime() {                return $this->time;}
    function getDescription() {         return $this->description;}
    function getMore() {                return $this->more;}
    function getReport() {              return $this->report;}

    function getType() {                return $this->type;}
    function getProject() {             return $this->project;}
    function getStatus() {              return $this->status;}
    
    // SETTER
    function setId($id): void {                             $this->id = $id;}
    function setName($name): void {                         $this->name = $name;}
    function setDate($date): void {                         $this->date = $date;}
    function setTime($time): void {                         $this->time = $time;}
    function setDescription($description): void {           $this->description = $description;}
    function setMore($more): void {                         $this->more = $more;}
    function setReport($report): void {                     $this->report = $report;}

    function setType($type): void {                         $this->type = $type;}
    function setProject($project): void {                   $this->project = $project;}
    function setStatus($status): void {                     $this->status = $status;}


    public function jsonSerialize(){ return get_object_vars($this); }
}
?>