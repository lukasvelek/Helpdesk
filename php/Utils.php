<?php

class Utils {
  private $passwordLength;
  private $passwordString;

  function __construct() {
    $this->passwordLength = 12;
    $this->passwordString = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ1234567890_.";
  }

  function randomPasswordGenerator() {
    $password = "";

    for($i = 0; $i < $this->passwordLength; $i++) {
      $r = rand(0, strlen($this->passwordString));

      $password = $password . $this->passwordString[$r];
    }

    return $password;
  }

  function resolveErrorCode($errCode) {
    $c = $errCode;

    switch($c) {
      case "100":
        return "Account is blocked! Please contact an administrator.";
      case "101":
        return "Account does not exist! Please contact an administrator.";
    }
  }
}

?>
