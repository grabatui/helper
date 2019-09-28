import React from "react";
import LoginModalComponent from "../../../../../Modal/Login";
import {get} from "../../../../../../domain/User";

class LoginComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            loggedIn: false,
            modalIsOpen: false,
            loaded: false,
        };

        this.toggleModal = this.toggleModal.bind(this);
        this.openModal = this.openModal.bind(this);
        this.closeModal = this.closeModal.bind(this);
    }

    componentDidMount() {
        get().then((result) => {
            this.setState((state) => {
                return {
                    ...state,
                    loggedIn: (result && result.value),
                    loaded: true,
                };
            });
        });
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
        if (!this.state.loaded) {
            return ``;
        }

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

export default LoginComponent;
