// echo "<script>alert('match, in database')</script>";
// echo "<a href='signup.php'>back</a><br>";
// echo $vno,"/",$arrayvno['number'],"/",$nic,"/",$arraynic['nic'];

// echo $vno,"/",$arrayvno['number'],"/",$arrayvno['brand'],"/",$arrayvno['model'],"/",$arrayvno['color']
// ,"/",$nic,"/",$arraynic['nic'],"/",$arraynic['licence number'],"/",$arraynic['name'],"/",$arraynic['address'];

// $_SESSION['user'][$nic]=$vno;
// $_SESSION['owner'][$nic]=$arraynic['name'];
// $_SESSION['owner'][$arraynic['licence number']]=$arraynic['address'];
// $_SESSION['vehicle'][$vno]=$arrayvno['color'];
// $_SESSION['vehicle'][$arrayvno['brand']]=$arrayvno['model'];

// echo "<br>";
// echo "<br>";


INSERT INTO Table2 (<columns>)
SELECT <columns>
FROM Table1
WHERE <condition>;

DELETE FROM Table1
WHERE <condition>;