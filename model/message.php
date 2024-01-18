<?php

class Message{
    public int $messageid;
    public string $text;
    public int $accountid;
    public string $datetime;

    public function __construct($messageid, $text, $accountid, $datetime){
        $this->messageid = $messageid;
        $this->text = $text;
        $this->accountid = $accountid;
        $this->datetime = $datetime;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }


    private function writeMessage($text, $accountid, $datetime){
        return "INSERT INTO Message (Text, AccountID, DateTime)
        VALUES (\"$text\", \"$accountid\", NOW())";
    }

    public function sendMessageToDatabase($connection){
            return $connection->query($this->writeMessage($this->text, $this->accountid, $this->datetime));
    }


}

?>