
				
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f9f9f9;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.simple-table {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.simple-table th, 
.simple-table td {
    padding: 10px 15px;
    border: 1px solid #ddd;
}

.simple-table th {
    background-color: #f4f4f4;
    color: #333;
    font-weight: bold;
}

.simple-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

	</style>
</head>
<body>
<div class="">
	<table class="simple-table" id="" width="100%" cellspacing="0">
		<thead class="">
			<tr align="center">
				<th width="10%">Peringkat</th>
				<th>Alternatif</th>
				<th width="20%">Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach($rows as $row): ?>
							<tr>
								<td align="center"><?= $i++ ?></td>
								<td><?= $row->nama_alternatif ?></td>
								<td align="center"><?= $row->nilai ?></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
</body>
</html>
