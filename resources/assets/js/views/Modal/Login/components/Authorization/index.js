import React from "react";
import PropTypes from "prop-types";

class AuthorizationComponent extends React.Component {
    render() {
        return (
            <React.Fragment>
                <h2 className="title is-4 has-text-centered">Sign in</h2>

                <form action="" method="POST">
                    <div className="field">
                        <label className="label" htmlFor="login-email">Email</label>

                        <div className="control has-icons-left">
                            <input className="input" type="email" id="login-email" placeholder="51neo42@gmail.com"/>

                            <span className="icon is-small is-left">
                                <i className="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>

                    <div className="field">
                        <label className="label" htmlFor="login-password">Password</label>

                        <div className="control has-icons-left">
                            <input className="input" type="password" id="login-password" placeholder="******"/>

                            <span className="icon is-small is-left">
                                <i className="fas fa-lock"></i>
                            </span>
                        </div>
                    </div>

                    <div className="field is-grouped is-grouped-right">
                        <div className="control">
                            <button className="button is-text">Forgot password</button>
                        </div>
                        <div className="control">
                            <button className="button is-primary">Login</button>
                        </div>
                    </div>
                </form>
            </React.Fragment>
        );
    }
}

export default AuthorizationComponent;
