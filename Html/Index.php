<?php include("Links.php"); ?>
<script src="../JS/Defaults.js"></script>
<script src="../JS/buyCheck.js"></script>
<!--<script src="../JS/NewsLoader.js"></script>-->
<script src="../JS/Cart.js"></script>
</header>
<?php include("Header.php"); ?>
<?php include("Navbar.php"); ?>

<div class="container-fluid divisorStrong">
    <div class="row items" id="EntryMsg" style="">
        <div class="col-12">
            <h2>Hello <span id="welcome"></span></h2>
        </div>
    </div>

    <div class="row no-gutters items" id="NewsDiv">
    <div class="col-xl-6 col-12 mb-5 mb-xl-0">
        <div class="media media-news">
            <div class="media-img">
                <img class="NewsImg" src="../Img/shutterstock_1491910001.jpg" alt="Generic placeholder image">
            </div>
            <div class="media-body">
                <span class="media-date">25 july 2017</span>
                <h5 class="mt-0 sep">Learn more About Us</h5>
                <p>Lorem ipsum dolor amet consectetur adip sicing elit sed eiusm tempor incididunt ut labore dolore.</p>
                <a href="AboutUs.php" class="btn btn-transparent">View More</a>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-12">
        <div class="media media-news">
            <div class="media-img">
                <img class="NewsImg" src="../Img/shutterstock_1701403291.jpg" alt="Generic placeholder image">
            </div>
            <div class="media-body">
                <span class="media-date">13 August 2018</span>
                <h5 class="mt-0 sep"> Our suppliers</h5>
                <p>Facilisi morbi tempus iaculis urna id volutpat lacus. Mi eget mauris pharetra et. Fermentum iaculis</p>
                <a href="Suppliers.php" class="btn btn-transparent">View More</a>
            </div>
        </div>
    </div>
    </div>

</div>

<?php include("Footer.php"); ?>
