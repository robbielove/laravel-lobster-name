<?php

// take a first_name and use the first letter
// to make a (L)obster name
// e.g. Sammy Sobster
public function getLobsterNameAttribute() {
  $letter = substr($this->first_name, 0, 1);
  return $this->first_name . ' ' . ucfirst($letter) . 'obster';
}

?>

@role('root')
  <div class="four wide column">
    <h4><i class="user icon"></i>Lobster Name</h4>
  </div>
  <div class="twelve wide column">
    <h4>{{$user->lobster_name}}</h4>
  </div>
@endrole
