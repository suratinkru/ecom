<?php 

include_once "./layouts/header.php"

?>

<style>

.login-container{
    margin-top: 5%;
    margin-bottom: 5%;

}
.login-form-1{
    padding: 0%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

</style>

<div class="container login-container ps-5 pe-5">
            <div class="row">
                <div class="col-md-6 login-form-1">
                <img src="./assets/images/loginimg.webp" class="img-fluid" alt="..." style="height: 100%; object-fit: cover;">
                </div>
                <div class="col-md-6 login-form-2">
                  

                  <h3>Register</h3>
                    <form action="controllers/register.php" method="post">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="username" placeholder="Your Username *" value="" required/>
                        </div>
                        <div class="form-group mb-2">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" required />
                        </div>
                        <div class="form-group mb-2">
                            <input type="password" class="form-control" name="confpassword" placeholder="Your Confirm Password *" value="" required />
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="fname" placeholder="Your First Name *" value="" required />
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="lname" placeholder="Your Last Name *" value="" required />
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="phone" placeholder="Your Phone *" value="" required />
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" required />
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Your Address *" value="" required />
                        </div>
                        <div class="form-group mb-2">
                            <button  type="submit" class="btnSubmit" value="Login" > Register</button>
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>





<?php 

include_once "./layouts/footer.php"

?>