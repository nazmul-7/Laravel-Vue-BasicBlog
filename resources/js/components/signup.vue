<template>
<div>
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-auto">

            <!-- Default form register -->
<form class="text-center border border-light p-5" @click.prevent = "formSubmit">

    <p class="h4 mb-4">Sign up</p>

    
     <!-- First name -->
    <input type="text"  class="form-control" placeholder="User name">

    <!-- E-mail -->
    <input type="password"  class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">

    <!-- Password -->
    <input type="password"  class="form-control" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>

    

    

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

    
    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a> and
        <a href="" target="_blank">terms of service</a>. </p>

</form>
<!-- Default form register -->



            </div>
        </div>

    
    </div>
</template>