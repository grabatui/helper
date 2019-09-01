import React from "react";
import PropTypes from "prop-types";
import LoginModalComponent from "../../../../../Modal/Login";

class LoginComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            loggedIn: false,
            modalIsOpen: false,
        };

        this.toggleModal = this.toggleModal.bind(this);
        this.openModal = this.openModal.bind(this);
        this.closeModal = this.closeModal.bind(this);
    }

    toggleModal(modalState) {
        this.setState((state) => {
            return {
                ...state,
                modalIsOpen: modalState,
            }
        });
    }

    openModal() {
        this.toggleModal(true);
    }

    closeModal() {
        this.toggleModal(false);
    }

    render() {
        return (
            this.state.loggedIn ? (
                <a className="button is-medium is-primary" title="Login" href="/cabinet">
                    <span className="icon">
                        <i className="fas fa-user"></i>
                    </span>
                </a>
            ) : (
                <React.Fragment>
                    <div className="control">
                        <button className="button is-medium is-primary" title="Login" onClick={this.openModal}>
                            <span className="icon">
                                <i className="fas fa-user"></i>
                            </span>
                        </button>
                    </div>

                    <LoginModalComponent
                        isOpen={this.state.modalIsOpen}
                        onCloseClick={this.closeModal}
                    />
                </React.Fragment>
            )
        );
    }
}

LoginComponent.propTypes = {
    loggedIn: PropTypes.bool,
};

export default LoginComponent;
