<div class="modal">
    <div class="modal-background"></div>

    <div class="modal-content">
        <div class="box">
            <h2 class="title is-4 has-text-centered">Sign in</h2>

            <form action="" method="POST">
                <div class="field">
                    <label class="label" for="login-email">Email</label>

                    <div class="control has-icons-left">
                        <input class="input" type="email" id="login-email" placeholder="51neo42@gmail.com" />

                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="login-password">Password</label>

                    <div class="control has-icons-left">
                        <input class="input" type="password" id="login-password" placeholder="******" />

                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <button class="button is-text">Forgot password</button>
                    </div>
                    <div class="control">
                        <button class="button is-primary">Login</button>
                    </div>
                </div>
            </form>

            <hr />

{{--                <h2 class="title is-4 has-text-centered">--}}
{{--                    <a href="#" class="has-text-info">...or sign up</a>--}}
{{--                </h2>--}}

            <form action="" method="POST">
                <div class="field">
                    <label class="label" for="register-email">Email</label>

                    <div class="control has-icons-left">
                        <input class="input" type="email" id="register-email" placeholder="51neo42@gmail.com" />

                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="register-password">Password</label>

                    <div class="control has-icons-left">
                        <input class="input" type="password" id="register-password" placeholder="******" />

                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="register-repeat-password">Repeat Password</label>

                    <div class="control has-icons-left">
                        <input class="input" type="password" id="register-repeat-password" placeholder="******" />

                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <button class="button is-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <button class="modal-close is-large" aria-label="close"></button>
</div>