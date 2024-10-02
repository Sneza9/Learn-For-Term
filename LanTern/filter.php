<?php
	session_start();
	include('config/konekcija.php');

	if(isset($_POST["action"]))
	{
		$query = "SELECT * FROM oglasi o 
		inner join kategorija k on o.idKategorija = k.idKategorija
		inner join grad g ON o.idGrad = g.idGrad 
		inner join korisnici ko ON o.idKorisnik = ko.idKorisnik
		";
		//&& !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])
		if(isset($_POST["minimum_price"], $_POST["maximum_price"]) )
		{
			$query.= " AND cena BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
		}
		
		if(isset($_POST["grad"]))
		{
			$grad_filter = implode("','", $_POST["grad"]);
			$query .= " AND o.idGrad IN('".$grad_filter."')";
		}
		
		if(isset($_POST["kategorija"]))
		{
			$kategorija_filter = implode("','", $_POST["kategorija"]);
			$query .= " AND o.idKategorija IN('".$kategorija_filter."')";
		}
		$statement = mysqli_query($kon,$query); 
		
		$output = '';
		
		while($result= mysqli_fetch_array($statement))
		{
			$total_row = count($result);
			if($total_row > 0)
			{
				$rezultatSlika= $result['slikaOglas'];
				$rezSlika = substr($rezultatSlika, 3);
				
				$rezultatSlikaKorisnik= $result['slika'];
				$rezSlikaKorisnik = substr($rezultatSlikaKorisnik, 3);
				
				$idOglasa = $result['idOglasa'];
					$output .= ' 
					<div class="col-lg-4">
						<div class="course-one__single">
							<div class="course-one__image">';
								$output .= '<img src="'.$rezSlika.'" width="100" height="200"/>';
								$output .= '</div>
							<div class="course-one__content">

								<a href="#" class="course-one__category"></a>
								<div class="course-one__admin">';
									$output .= '<img src="'.$rezSlikaKorisnik.'"/>';
									$output .= 'Objavio <a>'.$result['ime'].'</a>
								</div>

								<h2 class="course-one__title">
									<a>'.$result['naslov'].'</a>
								</h2>
							 
								<div class="course-one__meta">
								   	<a>
										<i class="far fa-clock"></i> 45 min
									</a>
									<a>'.$result['cena'].' RSD</a>
								</div>

								<a href="oglas-detalji.php?idOglasa='.$idOglasa.'" class="course-one__link">Pregledaj oglas</a>
							</div>
						</div>
					</div>
				';
			}
			else
			{
				$output = '';
			}
		}
		echo $output;
	}
?>