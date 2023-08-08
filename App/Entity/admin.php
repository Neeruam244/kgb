<?php 

class Administrator 
{
    public PDO $pdo;
    public INT $id_admin;
    public string $last_name;
    public string $first_name;
    public string $mail;
    private string $password;
    public string $creation_date;

}