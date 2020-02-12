<?php

class Bob
{
    public function reply($phrase): string 
    {
        $json = file_get_contents('https://en.wikiquote.org/w/api.php?format=json&action=parse&page=Samuel_Beckett#Waiting_for_Godot_(1952)&prop=text');
        $data = json_decode($json, true);

        return $data['parse']['text']['*'];
    }
}

