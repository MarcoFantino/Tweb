<?php include("Links.php"); ?>
<script src="../JS/Defaults.js"></script>
<script src="../JS/buyCheck.js"></script>
<script src="../JS/Cart.js"></script>
<script src="../JS/DescriptionLoader.js"></script>
</header>

<?php include("Header.php"); ?>
<?php include("Navbar.php"); ?>

<div class="container-fluid divisorStrong items content" id="body">

    <div class="row justify-content-center box">
        <div class="row order">
            <div class="col-3 h-75">
                <img class="cartImg" id="descImg">
            </div>
            <div class="col-7 h-100">
                <h3 id="descTit"></h3>
                <div class="rating-wrap">
                    <div class="label-rating" id="descNRev"></div>
                    <div class="label-rating" id="descDate"> </div>
                </div>
                <div class="descriptionView">
                    <h5>Description</h5>
                    <p id="descText">
                    </p>
                </div>
            </div>
            <div class="col-2  d-flex align-items-center justify-content-center descBox">
                <div class="text-center">
                    <h5 id="descPrice"></h5>
                    <button class="btn descButton" id="descBuyBtn">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center box divisorStrong" id="revContainer">
        <div class="row order ">
            <div class="col-10">
                <h3>Reviews</h3>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <button type="button" class="btn descButton" id="writeRev">Write review</button>
            </div>
        </div>
    </div>

</div>

<?php include("Footer.php"); ?>
