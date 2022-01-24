<?php include("Links.php"); ?>
<script src="../JS/Login.js"></script>
</header>

<?php include("Header.php"); ?>
<!--Log in Container!-->
    <!--Riga!-->
    <div class="row" id="LogInBody">
        <!--Col1!-->
        <div class="col-md-4 d-flex align-items-center justify-content-center h-100 LogInBorder">
            <form id="LogInForm" class="w-50" method="post" action="../Php/LoginCheck.php">
                <h2 class="text-center">Log in</h2>
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter email" name="username" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" placeholder="Password" required minlength="3" name="pwd">
                </div>
                <br>
                <div class="d-flex">
                    <div class="w-50  p-2 align-items-center">
                        <button type="submit" class="btn btn-primary h-75" id="btn">Submit</button>
                    </div>
                    <div class="w-50  p-2">
                        <a href="./NewAccount.php" id="NewAcc" type="button"><p class="text-center">Create new Account</p></a>
                    </div>
                </div>
                <div>
                    <span id="flash"></span>
                </div>
            </form>
        </div>
        <!--Col2!-->
        <div class="col-md-8 d-flex align-items-center justify-content-center">
            <h1 id="test">The best platform for books</h1>
        </div>
    </div>

<?php include("Footer.php"); ?>
