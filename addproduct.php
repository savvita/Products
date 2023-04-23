<!doctype html>
<html lang="en">
<?php include_once 'components/head.php'; ?>
<body>
<div class="container d-flex flex-column" style="min-height: 100vh;">
    <?php include_once 'components/nav.php'; ?>
    <main class="flex-grow-1 p-4 border border-light shadow">
        <h2 class="text-center mb-3">Add new product</h2>
        <form method="post" action="/actions/add.php">
            <div class="row">
                <div class="col-2">
                    <label for="title" class="form-label">Title</label>
                </div>
                <div class="col-10">
                    <input id="title" type="text" name="title" class="form-control" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    <label for="price" class="form-label">Price</label>
                </div>
                <div class="col-10">
                    <input id="price" type="text" name="price" class="form-control" />
                </div>
            </div>
            <input type="submit" value="Add" class="mt-2 btn btn-secondary ps-5 pe-5" />
        </form>
    </main>
    <?php include_once 'components/footer.php'; ?>
</div>
</body>
</html>




<?php //include 'components/header.php' ?>
<!--        <a href="index.php">List</a>-->
<!--        <form method="post" action="add.php">-->
<!--            <div class="row">-->
<!--                <div class="col-2">-->
<!--                    <label for="title" class="form-label">Title</label>-->
<!--                </div>-->
<!--                <div class="col-10">-->
<!--                    <input id="title" type="text" name="title" class="form-control" />-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row mt-2">-->
<!--                <div class="col-2">-->
<!--                    <label for="price" class="form-label">Price</label>-->
<!--                </div>-->
<!--                <div class="col-10">-->
<!--                    <input id="price" type="text" name="price" class="form-control" />-->
<!--                </div>-->
<!--            </div>-->
<!--            <input type="submit" value="Add" class="mt-2 btn btn-secondary ps-5 pe-5" />-->
<!--        </form>-->
<?php //include 'components/footer.php' ?>