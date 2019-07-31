<?php


interface CommandHandlerBehaviour
{

    public function showAllCommands();

    public function getUserCommandAndExecute();

    public function readUserInput();
}