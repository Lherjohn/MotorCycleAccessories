<?php
include 'header.php';
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    ob_end_flush();
}
?>


<div class="container-fluid d-flex justify-content-center">


    <div class="search_main">
        <div class="student_search">
            <form action="" method="POST">
                <input type="hidden" name="userID" value="<?= $_SESSION['u_id'] ?>">
                <input class="border-primary rounded-2 px-2 py-1 " type="text" name="items" value=""
                    placeholder="Search Accessories">
                <input class="text-primary border-primary rounded-2 px-2 py-1" type="submit" name="search"
                    value="Search">
            </form>
            <?php
                                include 'search.php'
                                ?>
        </div>
    </div>
</div>

<div class="tab-content d-flex my-5 justify-content-center align-items-center" id="v-pills-tabContent"
    style="height: 300px;">





    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
        tabindex="0">


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
                        
                   
                        $itemsPerPage = 5;
                        $cnt = 1;

                        $currentPage = isset($_GET['page']) ? max(1, $_GET['page']) : 1;

                        $offset = ($currentPage - 1) * $itemsPerPage;

                        $getItems = $conn->prepare("SELECT * FROM accessories WHERE userID=? LIMIT $offset, $itemsPerPage");
                        $getData->execute([$userID]);
                        foreach($getData as $data) { ?>


                <tr>
                    <th class="px-md-4"><?= $cnt++ ?></th>
                    <td class="px-md-4"><?= $data['items'] ?></td>
                    <td class="px-md-4"><?= $data['price'] ?></td>
                    <td class="px-md-4"><?= $data['quantity'] ?></td>
                    <td class="px-md-4"><?= $data['price'] * $data['quantity'] ?></td>

                    <td class="px-md-1">
                        <a class="text-decoration-none px-1 " href="new.php?update&id=<?= $data['p_id'] ?>"
                            class="text-decoration-none">✏</a>
                        |
                        <a class="text-decoration-none px-1 " href="backend.php?delete&id=<?= $data['p_id'] ?>"
                            class="text-decoration-none">❌</a>
                        <?php } ?>

                        <?php
                         if (empty($totalItems)) { ?>
                        <div class="container d-flex justify-content-center ">
                           
                        </div>
                        <?php } else { ?>
                        <div class="container d-flex justify-content-center ">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link user-select-none " aria-label="Previous">
                                            <span aria-hidden="true">•</span>
                                        </a>
                                    </li>
                                    <?php
                                for ($i = 1; $i <= ceil($totalItems / $itemsPerPage); $i++) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                    <?php } ?>
                                    <li class="page-item">
                                        <a class="page-link user-select-none" aria-label="Next">
                                            <span aria-hidden="true">•</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <?php } ?>
    </div>


    <?php
                    if (isset($_GET['update'])) { ?>

    <?php
                        $id = $_GET['id'];

                        $getUser = $conn->prepare("SELECT * FROM accessories WHERE p_id = ?");
                        $getUser->execute([$id]);

                        foreach ($getUser as $data) { ?>

    <form method="POST" action="process.php">
        <div class="mb-1 row">
            <div class="col-3 py-1">
                <label for="item" class="form-label"><b>Item:</b></label>
            </div>
            <div class="col">
                <input type="hidden" class="form-control" name="userID" value="<?= $data['p_id'] ?>">
                <input type="text" class="form-control" id="item" style="font-size: .7rem;" name="item"
                    value="<?= $data['items'] ?>">
            </div>
        </div>
        <div class="mb-1 row">
            <div class="col-3 py-1">
                <label for="price" class="form-label "><b>Price:</b></label>
            </div>
            <div class="mb-1 col">
                <input type="text" class="form-control" id="price" style="font-size: .7rem;" name="price"
                    value="<?= $data['price'] ?>">
            </div>
        </div>
        <div class="mb-1 row">
            <div class="col-3 py-1">
                <label for="quantity" class="form-label "><b>Quantity:</b></label>
            </div>
            <div class="mb-1 col">
                <input type="text" class="form-control" id="quantity" style="font-size: .7rem;" name="quantity"
                    value="<?= $data['quantity'] ?>">
            </div>
        </div>
        <div class="my-3 form-check card-body text-center">
            <button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>
        </div>
    </form>
    <?php   } ?>
    <?php } else { ?>

    </a>
    </li>
    </ul>
    </nav>
</div>
<?php } ?>

</tr>

</td>
</table>
</div>

</tbody>

</div>
</div>
</div>

</div>
</body>

</html>