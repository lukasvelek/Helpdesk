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
    switch($errCode) {
      case "100":
        return "Account is blocked! Please contact an administrator.";
      case "101":
        return "Account does not exist! Please contact an administrator.";
    }
  }

  function resolveStatus($status) {
    switch($status) {
      case "opened":
        return "Opened";
      case "postponed":
        return "Postponed";
      case "closed":
        return "Closed";
      case "waiting_for_author":
        return "Waiting for author";
      case "waiting_for_solver":
        return "Waiting for solver";
    }
  }

  function createNormalDate($date) {
    $normalDate = date('m/d/Y H:i:s', strtotime($date));

    return $normalDate;
  }

  function shortenText($text) {
    $shortenedText = "";
    $length = 50;

    for($i = 0; $i < 50; $i++) {
      $shortenedText = $shortenedText . $text[$i];
    }
  }
}

?>
