<?php include("Links.php"); ?>
<script src="../JS/NewUser.js"></script>
</head>

<?php include("Header.php"); ?>
<div class="row" id="LogInBody">
    <div class="container w-50 d-flex align-items-center justify-content-center">
        <form id="NewUserForm" class="w-50" action="../Php/NewAccountCheck.php" method="post">
            <h2 class="text-center">Create a new Account</h2>
            <br>
            <div class="form-group">
                <label for="Username">Username</label>
                <input class="form-control" type="text" id="Username" placeholder="Enter Username" name="UserName" required minlength="1">
                <p class="errCode" id="UsernameErr"></p>
            </div>
            <div class="form-group">
                <label for="Email">Email address</label>
                <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter email" name="Email" required>
                <p class="errCode" id="EmailErr"></p>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="Password" name="Password" required minlength="3">
                <p class="errCode" id="PasswordErr"></p>
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Type" id="inlineRadio1" value="0" checked>
                    <label class="form-check-label" for="inlineRadio1">Buyer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Type" id="inlineRadio2" value="1">
                    <label class="form-check-label" for="inlineRadio2">Seller</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <button type="submit" class="btn btn-primary" id="Regbtn" >Register Now!</button>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a  href="Login.php"><p>Login Now</p></a>
                </div>
            </div>
            <br>
            <div>
                <p id="flash"></p>
            </div>
        </form>
    </div>
</div>

<?php include("Footer.php"); ?>
