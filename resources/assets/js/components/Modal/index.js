import React from "react";
import OriginalModalComponent from "react-modal";

OriginalModalComponent.setAppElement(`#application`);

class ModalComponent extends React.Component {
    render() {
        return (
            <OriginalModalComponent
                {...this.props}
                overlayClassName="modal-wrapper"
                className={{
                    base: `modal`,
                    afterOpen: `modal is-active`,
                    beforeClose: ``,
                }}
            >
                <div className="modal-background" onClick={this.props.onRequestClose}></div>

                <div className="modal-content">
                    {this.props.children}
                </div>

                <button
                    className="modal-close is-large"
                    aria-label="close"
                    onClick={this.props.onRequestClose}
                ></button>
            </OriginalModalComponent>
        );
    }
}

export default ModalComponent;
