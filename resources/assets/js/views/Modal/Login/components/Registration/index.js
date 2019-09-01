import React from "react";
import PropTypes from "prop-types";

class RegistrationComponent extends React.Component {
    render() {
        return this.props.isOpened ? (
            <form action="" method="POST">
                <div className="field">
                    <label className="label" htmlFor="register-email">Email</label>

                    <div className="control has-icons-left">
                        <input className="input" type="email" id="register-email" placeholder="51neo42@gmail.com"/>

                        <span className="icon is-small is-left">
                            <i className="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <div className="field">
                    <label className="label" htmlFor="register-password">Password</label>

                    <div className="control has-icons-left">
                        <input className="input" type="password" id="register-password" placeholder="******"/>

                        <span className="icon is-small is-left">
                            <i className="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div className="field">
                    <label className="label" htmlFor="register-repeat-password">Repeat Password</label>

                    <div className="control has-icons-left">
                        <input className="input" type="password" id="register-repeat-password" placeholder="******"/>

                        <span className="icon is-small is-left">
                            <i className="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div className="field is-grouped is-grouped-right">
                    <div className="control">
                        <button className="button is-primary">Register</button>
                    </div>
                </div>
            </form>
        ) : (
            <h2 className="title is-4 has-text-centered">
                <a href="#" className="has-text-info" onClick={this.props.onOpenClick}>...or sign up</a>
            </h2>
        );
    }
}

RegistrationComponent.propTypes = {
    isOpened: PropTypes.bool.isRequired,
    onOpenClick: PropTypes.func.isRequired,
};

export default RegistrationComponent;
