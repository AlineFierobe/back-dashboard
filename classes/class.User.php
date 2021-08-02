<?php
class User implements JsonSerializable 
{
    private $id = 0;
    private $firstName = null;
    private $lastName = null;
    private $more = null;
    private $icon = null;
    private $password = null;
    
    // CONSTRUCTOR
    function __construct($id, $firstName, $lastName, $more, $icon,$password) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->more = $more;
        $this->icon = $icon;
        $this->password = $password;
    }
    
    // GETTER
    function getId() {            return $this->id;}
    function getFirstName() {     return $this->firstName;}
    function getLastName() {      return $this->lastName;}
    function getMore() {          return $this->more;}
    function getIcon() {          return $this->icon;}
    function getPassword() {      return $this->password;}
    
    // SETTER
    function setId($id): void {                     $this->id = $id;}
    function setFirstName($firstName): void {       $this->firstName = $firstName;}
    function setLastName($lastName): void {         $this->lastName = $lastName;}
    function setMore($more): void {                 $this->more = $more;}
    function setIcon($icon): void {                 $this->icon = $icon;}
    function setPassword($password): void {         $this->password = $password;}


    public function jsonSerialize(){ return get_object_vars($this); }
}
?>