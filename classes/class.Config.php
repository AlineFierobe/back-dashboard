<?php
class Config implements JsonSerializable 
{
    private $id = 0;
    private $siteName = null;
    private $devName = null;
    private $devSite = null;
    private $about = null;
    
    // CONSTRUCTOR
    function __construct($id, $siteName, $devName, $devSite, $about) {
        $this->id = $id;
        $this->siteName = $siteName;
        $this->devName = $devName;
        $this->devSite = $devSite;
        $this->about = $about;
    }
    
    // GETTER
    function getId() {              return $this->id;}
    function getSiteName() {        return $this->siteName;}
    function getDevName() {         return $this->devName;}
    function getDevSite() {         return $this->devSite;}
    function getAbout() {           return $this->about;}
    
    // SETTER
    function setId($id): void {                     $this->id = $id;}
    function setSiteName($siteName): void {         $this->siteName = $siteName;}
    function setDevName($devName): void {           $this->devName = $devName;}
    function setDevSite($devSite): void {           $this->devSite = $devSite;}
    function setAbout($about): void {               $this->about = $about;}


    public function jsonSerialize(){ return get_object_vars($this); }
}
?>