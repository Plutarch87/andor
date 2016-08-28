<!DOCTYPE html>
<html>
<head>
	<title>Podaci Korisnika</title>
</head>
<body>
	<h1>Podaci kupca:</h1>
	<ul>
		<li><strong>Ime i Prezime: </strong> <?php echo $request->name; ?></li>
		<li><strong>Mesto: </strong> <?php echo $request->mesto; ?></li>
		<li><strong>Adresa: </strong> <?php echo $request->adresa; ?> </li>
		<li><strong>Napomena: </strong> <?php echo $request->napomena; ?></li>
	</ul>
	<h1>Naruceni predmet(i)</h1>
	<table>
		<tr>
			<th><strong>Naziv: </strong></th>
			<th><strong>|Sifra: </strong></th>
			<th><strong>|Kolicina: </strong></th>
			<th><strong>|Cena: </strong></th>
		</tr>
		
		<?php foreach($cart->items as $item) : ?>
			
			<tr>				
				<td>|<?php echo $item['item']->name; ?></td>
				<td>|<?php echo $item['item']->sifra; ?></td>
				<td>|<?php echo $item['qty']; ?></td>
				<td>|<?php echo $item['price']; ?></td>
			</tr>

		<?php endforeach; ?>
			<tr>
				<td>|</td>
				<td>|</td>
				<td>|</td>
				<th>|<b>Ukupno: <b><i><?php echo $order->total ?>din<i></th>
			</tr>
	</table>
</body>
</html>