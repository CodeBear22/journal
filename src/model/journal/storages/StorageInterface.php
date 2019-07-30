<?php


namespace src\model\journal\storages;

interface StorageInterface
{
    public function saveJournal($entry);

    public function deleteLastJournal();

    public function fetchJournals();

    public function makeConnection();
}