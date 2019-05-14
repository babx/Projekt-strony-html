<?php


	if(isset($_POST['imie'], $_POST['nazwisko'], $_POST['email'], $_POST['haslo'])) {
		$db = [
			"host" => "localhost",
			"user" => "root",
			"pass" => "",
			"database" => "eclinic"
		];
		
		$conn = new mysqli(
			$db["host"],
			$db["user"],
			$db["pass"],
			$db["database"]
		);
		
		$query = $conn->prepare("INSERT INTO pacjenci (imie, nazwisko, email, haslo) VALUES (?, ?, ?, ?)");
		$query->bind_param("ssss", $imie, $nazwisko, $email, $haslo);
		
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$email = $_POST['email'];
		$haslo = hash("md5", $_POST['haslo']);
		
		
		if($query->execute()) {
			echo "Pomyslnie dodano uzytkownika. <br> <a href='index.html'>Powrot do strony glownej</a>";
		}
		$query->close();
		
		$conn->close();
		
	}


?>