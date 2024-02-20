<?php
if (isset($_POST['search'])) {
?>


	<div class="container d-flex justify-content-center ">
		<table class="table mt-2 table-borderless">
			<thead class="alert-info">
			</thead>
			<tbody>
				<?php
				$id = $_POST['userID'];
				$keyword = $_POST['items'];
				$getWord = $conn->prepare("SELECT * FROM `accessories` WHERE `userID` LIKE '%$id%' AND `items` LIKE '%$keyword%'");
				$getWord->execute();
				foreach ($getWord as $word) {
				?>
					<tr>
						<td><?= $word['items'] ?></td>
						<td><?= $word['price'] ?></td>
						<td><?= $word['quantity'] ?></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
<?php
}
?>