<?php

require_once("src/model/user/User.php");

use src\model\user\User;

class UserCommandHandler implements CommandHandlerBehaviour
{
    private $userObject;

    public function __construct()
    {

        $this->userObject = new User();

//        $this->showAllCommands();
    }

    public function showAllCommands()
    {
        $userCommands = [
            "Press 1 : To sign in.",
            "Press 2 : To sign up."
        ];

        print implode(PHP_EOL, $userCommands);
        print PHP_EOL;

    }

    public function getUserCommandAndExecute()
    {
        $userInput = $this->readUserInput();

        if(is_numeric($userInput))
        {
            print "Only integer value allowed";
        } else {
            switch ($userInput)
            {
                case 1 : $this->executeSignInCommand();
                break;
                case 2 : $this->executeS
            }
        }
    }

    public function executeSignInCommand()
    {
        print "Enter username" . PHP_EOL;
        $username = $this->readUserInput();

        print "Enter password" . PHP_EOL;
        $password = $this->readUserInput();

        $isValid = $this->userObject->loginProcess($username, $password);

        if($isValid)
        {
            $GLOBALS['loggedIn'] = TRUE;
            print "You are successfully loggin." . PHP_EOL;
            return $password;

        } else{
            print "Invalid username password." . PHP_EOL;
        }

    }

    public function executeSignInCommand()
    {
        print "Enter username" . PHP_EOL;
        $username = $this->readUserInput();

        print "Enter password" . PHP_EOL;
        $password = $this->readUserInput();

        $isValid = $this->userObject->loginProcess($username, $password);

        if($isValid)
        {
            $GLOBALS['loggedIn'] = TRUE;
            print "You are successfully loggin." . PHP_EOL;
            return $password;

        } else{
            print "Invalid username password." . PHP_EOL;
        }

    }

    public function readUserInput()
    {
        $handle = fopen ("php://stdin","r");
        $input = fgets($handle);

        return $input;
    }
}