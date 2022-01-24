<?php include("Links.php"); ?>
<script src="../JS/Defaults.js"></script>
<script src="../JS/sellCheck.js"></script>
</header>
<?php include("Header.php"); ?>
<?php include("SellerNavbar.php"); ?>

<div class="container-fluid content  items divisorStrong">
    <div class="col-md-12 d-flex justify-content-center h-100">
        <form id="UploadBook" class="w-50" method="post" action="../Php/UploadForm.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" class="form-control" id="Btitle" aria-describedby="emailHelp" placeholder="Enter Title" name="BookTitle" required>
            </div>
            <div class="form-group">
                <label for="Subtitle">Subtitle</label>
                <input type="text" class="form-control" id="BsubTitle" placeholder="Enter Subtitle" required minlength="3" name="BookSubtitle">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" id="Bdescription" name="BookDescription" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="number" class="form-control" id="Bprice" min="1" name="BookPrice" required>
            </div>
            <div class="form-group">
                <label for="Date">Publication Date</label>
                <input type="date" class="form-control" id="Bdate" required minlength="3" name="BookDate">
            </div>
            <div class="form-group">
                <label for="Cover">Cover</label>
                <input type="file" class="form-control" id="Bcover" required name="BookCover">
            </div>
            <br>
            <div class="d-flex">
                <div class="w-50  p-2 align-items-center">
                    <button type="submit" class="btn btn-primary h-75" id="btn">Submit</button>
                </div>
            </div>
            <br>
            <div>
                <span id="flash"></span>
            </div>
        </form>
    </div>
</div>

<?php include("Footer.php"); ?>
