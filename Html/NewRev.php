<?php include("Links.php"); ?>
<script src="../JS/Defaults.js"></script>
<script src="../JS/Cart.js"></script>
<script src="../JS/WriteRev.js"></script>
</header>

<?php include("Header.php"); ?>
<?php include("Navbar.php"); ?>

<div class="container-fluid divisorStrong items" id="body">

    <div class="row justify-content-center box">
        <div class="row order">
            <div class="col-2">
            </div>
            <div class="col-8 h-100">
                <div class="form-group">
                    <h3>Write Your Review</h3>
                    <label for="revForm"></label>
                    <textarea class="form-control" id="revForm" rows="10" maxlength="600" minlength="10" form="NewRev" ></textarea>
                    <br>
                    <span id="allarm"></span>
                    <div class="d-flex justify-content-end w-100">
                        <button type="button" class="btn btn-primary justify-content-end" name="revForm">Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

</div>

<?php include("Footer.php"); ?>
