<?php

namespace App\models;

interface Query
{

}
class Db_Query
{
    public static function Select_All($table): string
    {
        return 'SELECT * FROM $table';
    }
    public static function Create_User($email, $password,$name): string
    {
        return 'INSERT INTO users (name, email, password) VALUES ($name,$email,$password)';
    }
    public static function getUser($name): string
    {
        return 'SELECT * FROM users WHERE name = "'.$name.'"';
    }
}