<?php

// take a first_name and use the first letter
// to make a (L)obster name
// e.g. Sammy Sobster
public function getLobsterNameAttribute() {
  $letter = substr($this->first_name, 0, 1);
  return $this->first_name . ' ' . ucfirst($letter) . 'obster';
}

?>

    <h4>Lobster Name</h4>
    <h4><?php echo getLobsterNameAttribute() ?></h4>
