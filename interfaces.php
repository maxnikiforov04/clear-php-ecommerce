<?php
interface UserInterface{
    public function getName():string;
    public function getEmail():string;
    public function getPassword():string;
}