import React from "react";
import PropTypes from "prop-types";
import ModalComponent from "../../../components/Modal";
import RegistrationComponent from "./components/Registration";
import AuthorizationComponent from "./components/Authorization";

class LoginComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            signUpOpened: false,
        };

        this.onSignUpClick = this.onSignUpClick.bind(this);
        this.onModalClosed = this.onModalClosed.bind(this);
    }

    onSignUpClick() {
        this.setState((state) => {
            return {
                ...state,
                signUpOpened: true,
            };
        });
    }

    onModalClosed() {
        this.setState((state) => {
            return {
                ...state,
                signUpOpened: false,
            };
        }, () => this.props.onCloseClick())
    }

    render() {
        return (
            <ModalComponent
                isOpen={this.props.isOpen}
                onRequestClose={this.onModalClosed}
            >
                <div className="box">
                    <AuthorizationComponent />

                    <hr/>

                    {this.state.signUpOpened ?
                        <RegistrationComponent />
                        :
                        <h2 className="title is-4 has-text-centered">
                            <a href="#" className="has-text-info" onClick={this.onSignUpClick}>...or sign up</a>
                        </h2>
                    }
                </div>
            </ModalComponent>
        );
    }
}

LoginComponent.propTypes = {
    isOpen: PropTypes.bool,
    onCloseClick: PropTypes.func.isRequired,
};

export default LoginComponent;
