<?php include("Links.php"); ?>
<script src="../JS/Defaults.js"></script>
<script src="../JS/buyCheck.js"></script>
<script src="../JS/ProductLoader.js"></script>
<script src="../JS/Cart.js"></script>
</header>
<?php include("Header.php"); ?>
<?php include("Navbar.php"); ?>
<div class="container-fluid content  items divisorStrong">

    <div class="row">
        <div class="col-2 h-100">
            <div class="mb-2">
                <div>
                    <span class="labelTitle">Price</span>
                </div>
                <ul class="listStyle">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="filter" value="0">
                            <label class="form-check-label" for="flexCheckDefault">
                                Highest
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="filter" value="1">
                            <label class="form-check-label" for="flexCheckDefault">
                                Lower
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mb-2">
                <div>
                    <span class="labelTitle"">Publication Date</span>
                </div>
                <ul class="listStyle">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="filter" value="2">
                            <label class="form-check-label" for="flexCheckDefault" name="filter">
                                Recently Published
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mb-2">
                <div>
                    <span class="labelTitle"">Ratings</span>
                </div>
                <ul class="listStyle">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="filter" value="3">
                            <label class="form-check-label" for="flexCheckDefault">
                                Top Ratings
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="filter" value="4">
                            <label class="form-check-label" for="flexCheckDefault">
                                Low Ratings
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-10 divisorStrongLeft">
            <div class="row content-center" id="products">

            </div>
        </div>
        <!--
        <div class="col-md-4">
            <figure class="card card-product">
                <div class="img-wrap"><img src="../Img/3D%20MOCKUP%202.jpg"></div>
                <figcaption class="info-wrap">
                    <h4 class="title">Another name of item</h4>
                    <p class="desc">Some small description goes here</p>
                    <div class="rating-wrap">
                        <div class="label-rating">Reviews: 130</div>
                        <div class="label-rating">Publication date: 2021/17/20</div>
                        <div class="label-rating">Description</div>
                    </div>
                </figcaption>
                <div class="bottom-wrap d-flex">
                    <div class="price-wrap h5 w-50">
                        <span class="price-new">$1280</span>
                    </div>
                    <div class="d-flex justify-content-end w-50">
                        <button class="btn btn-sm btn-primary justify-content-end">Add to Cart</button>
                    </div>
                </div>
            </figure>
        </div>
       -->
    </div>
</div>

<?php include("Footer.php"); ?>
