<?php
include_once 'db/ProductRepository.php';
$repo = new \db\ProductRepository(\db\DB::getInstance());
$products = $repo->select($_POST['searchTxt'] ?? null);
?>

<!doctype html>
<html lang="en">
<?php include_once 'components/head.php'; ?>
<body>
<div class="container d-flex flex-column" style="min-height: 100vh;">
    <?php include_once 'components/nav.php'; ?>
    <main class="flex-grow-1 p-4 border border-light shadow">
        <div class="d-flex justify-content-center align-items-center">
            <h2 class="text-center me-2">Products</h2>
            (<a href="addproduct.php">Add new</a>)
        </div>
        <form action="./index.php" method="post">
            <div class="d-flex">
                <input name="searchTxt" class="form-control flex-grow-1" type="text" placeholder="Search..." />
                <button class="btn btn-secondary ps-4 pe-4">Search</button>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col" style="width: 100%">Title</th>
                <th scope="col">Price</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if($products !== null) :
                foreach($products as $iter) :
                    ?>
                    <tr>
                        <th scope="row"><?php echo $iter['id'] ?></th>
                        <td><?php echo $iter['title'] ?></td>
                        <td><?php echo $iter['price'] ?> </td>
                        <td><button class="btn btn-secondary ps-4 pe-4" onclick="startEditing(event)">Edit</td>
                        <td>
                            <form method="POST" action="actions/delete.php">
                                <input type='text' name='id' value='<?php echo $iter['id'] ?>' class='d-none' />
                                <button type="submit" class="btn btn-secondary ps-4 pe-4">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>

        </table>

        <?php include_once 'components/editform.php'; ?>
    </main>
    <?php include_once 'components/footer.php'; ?>
</div>
</body>
</html>