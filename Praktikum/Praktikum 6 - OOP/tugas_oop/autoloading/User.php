<?php

namespace Model;

class User {
  private $nama;

  public function __construct($nama) {
    $this->nama = $nama;
  }

  public function getNama() {
    return $this->nama;
  }
}
