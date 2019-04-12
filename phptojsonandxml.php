<?php
$username = "root";
$password = "";
$host = "localhost";
$db = "coba";

$conn = mysqli_connect($host, $username, $password, $db);

function SelectData($conn)
{
    $query = "Select * from mahasiswa";
    $result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);
    echo "MySQL Data: <br>";
    foreach ($result as $array) {
        print_r($array);
        echo "<br>";
    }
    return $result;
}
//to read mysql and change it to JSON and XML
// if ($conn) {
//     $result = SelectData($conn);

//     echo "<br><br>JSON Data: <br>";
//     $tojson = json_encode($result);
//     print_r($tojson . "<br>");

//     echo "<br><br>XML Data: <br>";
//     foreach ($result as $row) {
//         echo "&ltrow&gt<br>";
//         foreach ($row as $key => $value) {
//             echo "&emsp; &lt" . $key . "&gt" . $value . "&lt/" . $key . "&gt<br>";
//         }
//         echo "&lt/row&gt<br>";
//     }
// } else {

//     die("Error : Can't connect to database");
// }

// how to input json string to mysql table
// if ($conn) {
//     $input = '{"nama":"Siti","jk":"F","alamat":"Jl. Suka Maju"}';
//     mysqli_query($conn, InputWithJSON($input));
//     SelectData($conn);
// } else {
//     die("Error : Can't connect to database");
// }

// function InputWithJSON($jsonstring)
// {
//     $jsondecode = json_decode($jsonstring, true);
//     print_r($jsondecode);
//     echo "<br><br>";
//     $query = "INSERT INTO mahasiswa (nama,jk,alamat) values ('" . $jsondecode['nama'] . "','" . $jsondecode['jk'] . "','" . $jsondecode['alamat'] . "')";
//     print_r($query);
//     echo "<br><br>";
//     return $query;
// }

//how to input xml string to mysql table
if ($conn) {
    $input = "<document>
    <nama>Joko</nama>
    <jk>M</jk>
    <alamat>Jl. Suka suka</alamat>
    </document>";
    echo "XML Input: <br>" . $input;
    echo "<br><br>";
    // InputWithXML($input);
    mysqli_query($conn, InputWithXML($input));
    SelectData($conn);
} else {

    die(" Error: Can't connect to database");
}

function InputWithXML($xmlstring)
{
    $xmldecode = simplexml_load_string($xmlstring);
    echo "<br><br>";
    print_r($xmldecode);
    echo "<br><br>";
    $query = "INSERT INTO mahasiswa (nama,jk,alamat) values ('" . $xmldecode->nama . "','" . $xmldecode->jk . "','" . $xmldecode->alamat . "')";
    print_r($query);
    return $query;
}