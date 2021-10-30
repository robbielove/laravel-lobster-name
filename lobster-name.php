<?php

// take a first_name and use the first letter
// to make a (L)obster name
// e.g. Sammy Sobster

public function getLobsterNameAttribute($name) {
  $letter = substr($name, 0, 1);
  return $name . ' ' . ucfirst($letter) . 'obster';
}

?>

<h4>Lobster Name</h4>
<h4><?php echo getLobsterNameAttribute('Robbie') ?></h4>
