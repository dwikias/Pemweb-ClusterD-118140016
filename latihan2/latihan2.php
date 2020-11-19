<?php
$data = array("Jeruk", "Sawo", "Anggur", "Kelengkeng", "Kelapa","Jambu", "Pepaya", "Rambutan", "Durian", "Mangga" );

echo "Data acak Sebelum diurutkan :<br>";
  for ($i = 0; $i < count($data); $i++) {
    echo $i+1 . ". " . $data[$i] . "<br>";
}

sort($data); 

echo "<br>Data acak Setelah diurutkan :<br>";
  for ($i = 0; $i < count($data); $i++) {
    echo $i+1 . ". " . $data[$i] . "<br>";
}