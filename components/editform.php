<form id="edit" action="actions/edit.php" method="post" class="d-none">
    <input id="id" type="text" name="id" class="d-none" />
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
    <input type="submit" value="Save" class="mt-2 btn btn-secondary ps-5 pe-5" />
    <input type="reset" value="Cancel" class="mt-2 btn btn-secondary ps-5 pe-5" onclick="cancel()" />
</form>