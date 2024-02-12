
@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Login</title>
<body class="justify-content-center align-items-center d-flex min-vh-100"
style="background: #6f42c1 no-repeat; background-size: cover">
<div class="wrapper rounded-4 p-5 bg-transparent text-white"
     style="width: 420px; border: 2px solid rgba(255,255,255,.2)">
    <form action="">
        <h1 class="text-center">Login</h1>
        <div class="w-100 position-relative"
        style="margin: 30px 0; height: 50px">
            <input class="w-100 h-100 border rounded-5 bg-transparent" type="text" placeholder="Email" required>
            <i class="bi bi-person-fill position-absolute fs-2 mt-2" style="right: 20px"></i>
        </div>
        <div class="w-100 position-relative"
             style="margin: 30px 0; height: 50px">
            <input class="w-100 h-100 border rounded-5 bg-transparent" type="password" placeholder="Password" required>
            <i class="bi bi-lock-fill position-absolute fs-2 mt-2" style="right: 20px"></i>
        </div>
        <div class="d-flex justify-content-between fs-5 my-sm-3">
            <label>
                <input type="checkbox"> Remember me
            </label>
            <a href="#" class="text-white text-decoration-none">Forgot password?</a>
        </div>
        <button class="btn w-100 btn-light border-0 nice-box-shadow fs-3" type="submit">Login</button>
        <div class="fs-5 text-center mt-3 text-white">
            <p>Don't have an account?
                <a class="text-white text-decoration-none fw-bold " href="#">Register</a>
            </p>
        </div>
    </form>
</div>

</body>

<x-flash-message/>


