<body class="StandardStyles">
<div class="container-fluid">
<!--Header!-->
    <?php session_start();?>
<div class="row HeadFoot">
    <div class="col-md-10 d-flex justify-content-start align-items-center">
        <h1 class="display-4">Books for Days</h1>
    </div>
    <?php if(isset($_SESSION["uType"])) : ?>
        <div class="col-md-1 d-flex justify-content-center align-items-center">
            <?php if($_SESSION["uType"] == 0) : ?>
            <button class="btn btn-primary logElem" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" id="chartBtn">Cart</button>

            <div class="offcanvas offcanvas-end cartStyle" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header cartContainer">
                    <h5 id="offcanvasRightLabel">Cart</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body cartContainer">
                    <!--
                    <div id="cart">

                        <div class="row cartRow">
                            <div class="col-4">
                                <img class="cartImg" src="../Img/Mediterranean.jpg" >
                            </div>
                            <div class="col-8">
                                <h6>Title</h6>
                                <p >Subtitle</p>
                                <div class="price-wrap w-50">
                                    <span class="h6">$1280</span>
                                </div>
                                <div>
                                    <ul class="list-group list-group-horizontal listStyle">
                                        <li class="cartListItems d-flex align-items-center" >
                                            <span>qty: </span>
                                            <input type="text" name="quantity" class="form-control input-number textBox" value="1" min="1" max="100" disabled>
                                        </li>
                                        <li class="cartListItems d-flex align-items-center">Delete</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row" id="buyBar">
                        <div class="col-6 d-flex align-items-center">
                            <span id="totalPrice"></span>
                        </div>
                        <div class="col-6 float-right d-flex justify-content-end">
                            <button type="button" class="btn btn-primary logElem">Buy</button>
                        </div>
                    </div>
                    -->
                </div>
            </div>
            <?php endif; ?>
        </div>
    <div class="col-md-1 d-flex justify-content-center align-items-center logElem">
        <button type="button" class="btn btn-primary logElem" id="Logout">Log out</button>
    </div>
    <?php endif; ?>
</div>


