<form class="form" role="form" method="post">

    <div class="form-group">
        <label for="names">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Your Name" maxlength="100" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Your Email" maxlength="100" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Create a Password" minlength="8" maxlength="50" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="confirm">Confirm Password</label>
        <input type="password" class="form-control" name="confirm" placeholder="Confirm your Password" minlength="8" maxlength="50" autocomplete="off" required>
    </div>

    <button type="submit" class="btn btn-other btn-block" name="submit">Sign Up</button>
</form>
