<?php
include 'header.php';
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    ob_end_flush();
}
?>

<div class="container-fluid d-flex justify-content-center">
    <div class="tab-content d-flex my-5 justify-content-center align-items-center" id="v-pills-tabContent" style="height: 300px;">

        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
            <div class="px-2 position-relative" style="font-size: .8rem;">

                <table class="table">
                    <thead align="center">
                        <tr>
                            <th scope="col" class="px-md-4">#</th>
                            <th scope="col" class="text-start px-md-4">Accessories</th>
                            <th scope="col" class="px-md-4">Price</th>
                            <th scope="col" class="px-md-4">Quantity</th>
                            <th scope="col" class="px-md-4">Total</th>
                            <th scope="col" class="px-md-4">Action</th>
                        </tr>
                    </thead>
                    <tbody align="center">

                        <tr>
                        <?php
                        $userID = $_SESSION['u_id'];
                        $cnt = 1;
                        $getData = $conn->prepare("SELECT * FROM accessories WHERE userID = ?");
                        $getData->execute([$userID]);
                        foreach($getData as $data) { ?>
                                <th class="px-md-4"><?= $cnt++ ?></th>
                                <td class="px-md-4"><?= $data['items'] ?></td>
                                <td class="px-md-4"><?= $data['price'] ?></td>
                                <td class="px-md-4"><?= $data['quantity'] ?></td>
                                <td class="px-md-4"><?= $data['price'] * $data['quantity'] ?></td>
                                <td class="px-md-1">
                                        <a class="text-decoration-none px-1 " href="new.php?update&id=<?= $data['p_id'] ?>" class="text-decoration-none">✏</a>
                                        |
                                        <a class="text-decoration-none px-1 " href="backend.php?delete&id=<?= $data['p_id'] ?>" class="text-decoration-none">❌</a>
                                </td>
                            <?php } ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>