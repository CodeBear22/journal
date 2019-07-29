<?php


namespace src\model\journal\Storages;


interface StorageInterface
{
    public function saveJournal($entry);

    public function deleteLastJournal();

    public function  showJournals();

    public function makeConnection();
}