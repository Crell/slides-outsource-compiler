<?php


error_reporting(E_ALL);

/*
function showForm($user) {
    require_once('form_tools.php');

    $isAdmin = (bool)($user->isAdmin());

    $out = "<form>";
    $out .= "<input name='name'>";

    if ($isAdmin) {
        $out .= "<select name='role'>";
        $out .= "<option>Admin</option>\n";
        $out .= "<option>Peon</option>\n";
        $out .= "</option>";
    }

    $out .= "</form>";

    return $out;
}

class User {
    public function isAdmin() {
        return false;
    }
}

$user = new User();

showForm($user);
*/

/*
function sum_square($a, $b) {
  return ($a * $a) + ($b * $b);
}

Sign {
  POSITIVE,
  NEGATIVE,
  ZERO,
  UNKNOWN,
  NAN
}

POSITIVE * POSITIVE = POSITIVE;
POSiTIVE * NEGATIVE = NEGATIVE;
NEGATIVE * NEGATIVE = POSITIVE;
POSITIVE * ZERO = ZERO;
NEGATIVE * ZERO  = ZERO;
UNKNOWN * ZERO = ZERO;
UNKNOWN * POSITIVE = UNKNOWN;
UNKNOWN * NEGATIVE = UNKNOWN;

POSITIVE + POSITIVE = POSITIVE;
NEGATIVE + NEGATIVE = NEGATIVE;
POSITIVE + NEGATIVE = UNKNOWN;
POSITIVE + ZERO = POSITIVE;
NEGATIVE + ZERO = NEGATIVE;
POSITIVE + UNKNOWN = UNKNOWN;
NEGATIVE + UNKNOWN = UNKNOWN;

function compute($a, $b, $c) {
  return ($a + $b) / ($b * $c);
}

function is_bigger($x, $y) {
  return ($x > $y) ? $x : 0;
}
*/

function distance_between($src, $dest) {
  return '';
}

function compute_shipping($src, $user) {
  $dest = $user['addres'];

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

compute_shipping('123 Warehouse St., Las Vegas, NV', $user);

//////////

function compute_shipping($src, $user) {
  $dest = $user['address'];

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

compute_shipping('123 Warehouse St., Las Vegas, NV', $user);

//////////

function compute_shipping($src, $user) {
  $dest = $user['address'];

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

$user = 123;
compute_shipping('123 Warehouse St., Las Vegas, NV', $user);

//////////

function compute_shipping($src, array $user) {
  $dest = $user['address'];

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

$user = 123;
compute_shipping('123 Warehouse St., Las Vegas, NV', $user);

//////////

function compute_shipping($src, array $user) {
  $dest = $user['address'];

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

$user = ['id' => 123];
compute_shipping('123 Warehouse St., Las Vegas, NV', $user);

//////////

class User {
  public $id;
  public $address;

  public function __construct($id, $address) {
    $this->id = $id;
    $this->address = $address;
  }
}

function compute_shipping($src, User $user) {
  $dest = $user->address;

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

$user = new User(/*...*/);

compute_shipping('123 Warehouse St., Las Vegas, NV', $user);

//////////

class User {
  public $id;
  public $address;

  public function __construct($id, $address) {
    $this->id = $id;
    $this->address = $address;
  }
}

function compute_shipping($src, User $user) {
  $dest = $user->address;

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

$user = new User(123, [
  'street' => '456 Main',
  'city' => 'Chicago',
  'state' => 'IL',
  'zip' => 60614,
]);

compute_shipping('123 Warehouse St., Las Vegas, NV', $user);

//////////

class User {
  public $id;
  public $address;

  public function __construct($id, Address $address) {
    $this->id = $id;
    $this->address = $address;
  }
}

class Address {
  public $street;
  public $city;
  public $state;
  public $zip;
}

function distance_between(Address $src, Address $dest) {
  // ...
}

function compute_shipping($src, User $user) {
  $dest = $user->address;

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

$u_address = new Address();
$u_address->street = '456 Main St.';
$u_address->city = 'Chicago';
$u_address->state = 'IL';
$u_address->zip = 60614;

$user = new User(123, $u_address);

$dest = new Address(); // ...

compute_shipping($dest, $user);

//////////

class User {
  protected $id;
  protected $address;

  public function __construct($id, Address $address) {
    $this->id = $id;
    $this->address = $address;
  }

  public function getAddress() : Address {
    return $this->address;
  }
}

function compute_shipping($src, User $user) {
  $dest = $user->getAddress();

  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

$u_address = new Address(); // ...

$user = new User(123, $u_address);

$dest = new Address(); // ...

compute_shipping($dest, $user);

////////////////

function compute_shipping($src, AddressInterface $dest) {
  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

function distance_between(AddressInterface $src, AddressInterface $dest) {
  // ...
}

$u_address = new Address(); // ...
$user = new User(123, $u_address);

$dest = new Address(); // ...
compute_shipping($dest, $user->getAddress());

////////////

function compute_shipping($src, AddressInterface $dest) {
  $distance = distance_between($src, $dest);

  return $distance * .5; // 50 cents/mile
}

function distance_between(AddressInterface $src, AddressInterface $dest) : int {
  // ...
}

class Address implements AddressInterface {
  public function __construct(string $street, string $city, string $state, string $zip) {
    // ...
  }
  // ...
}

///////////

class ThingOne {
  public function helpCat() { /* ... */ }
}

class ThingTwo {
  public function helpCat() { /* ... */ }
}

class CatInTheHat {

  public function welcome(ThingOne $thing) {
    $thing->helpCat();
  }
}

