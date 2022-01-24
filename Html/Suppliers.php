<?php include("Links.php"); ?>
    <script src="../JS/Defaults.js"></script>
    <script src="../JS/Cart.js"></script>

    </header>

<?php include("Header.php"); ?>

<?php if($_SESSION["uType"] == 1) : ?>
    <?php include("SellerNavbar.php"); ?>
<?php else : ?>
    <?php include("Navbar.php"); ?>
<?php endif; ?>

    <div class="container-fluid divisorStrong items content" id="body">

        <div class="row">
            <div class="row justify-content-center order">
                <div class="row ordNum ">
                    <div class="col-12">
                        <h2>Suppliers</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center box">
            <div class="row order">
                <div class="col-3">
                </div>
                <div class="col-7 h-100">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lacinia vulputate ante non pellentesque.
                        Fusce eleifend lacinia mauris eu laoreet. Aliquam rutrum massa vitae magna lobortis posuere. In porttitor dignissim nibh, et aliquet quam cursus in.
                        Sed vitae mi in ante viverra pellentesque. Cras nibh leo, finibus vel convallis ac, molestie nec lectus. Nam in nisi interdum, semper leo a, consectetur augue. Nulla facilisi.
                        Aliquam facilisis rutrum suscipit. Cras pretium ex in ipsum fermentum, in malesuada ex imperdiet. Nullam aliquam iaculis placerat.
                    </p>
                    <br>
                    <p>Duis lobortis felis est, eget elementum dolor dignissim rhoncus. Pellentesque et faucibus ligula, quis fermentum sem.
                        Vivamus dui enim, maximus non consequat ornare, condimentum et nisi. Praesent tempor, justo id egestas sollicitudin, enim tellus congue nibh, in cursus dolor quam nec urna.
                        Vivamus at turpis et libero consectetur dapibus. Phasellus sed tristique eros.
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                        Fusce eu diam hendrerit leo consequat fringilla. Duis posuere, magna ut rutrum condimentum, neque lectus pellentesque mi, vel feugiat dui tellus non nisl.
                        Morbi id volutpat erat, quis consequat odio. Nulla varius sit amet tellus non molestie. Maecenas nec viverra risus. Sed at sollicitudin felis.
                        Etiam sit amet nisl quis purus iaculis pretium. Vestibulum id efficitur ipsum.
                    </p>
                    <br>
                    <p>Proin ac diam eget eros cursus scelerisque lobortis tristique odio. Morbi vulputate libero vitae aliquam accumsan.
                        Duis non nulla eu ante dignissim tristique. Curabitur ac blandit tellus, ut faucibus sapien.
                        Mauris iaculis odio vel orci commodo tristique sit amet sed neque. Phasellus pharetra laoreet urna, vel dapibus odio laoreet et.
                        Nam dui dui, consequat ac nisl eget, efficitur finibus ligula. Nunc non feugiat ante. Nam quis elementum nisl, tristique finibus augue.
                        Donec fermentum tristique mi, vitae interdum augue. Fusce et augue sodales, tempor justo dapibus, finibus metus.
                        Nunc eu est placerat, cursus elit at, fringilla nunc. Cras finibus nec urna eu varius.
                        Nunc fermentum risus mi, id suscipit ligula feugiat vel. Morbi sit amet pulvinar neque. Mauris vitae pretium odio.
                    </p>
                </div>
                <div class="col-2 ">

                </div>
            </div>
        </div>

    </div>

<?php include("Footer.php"); ?>