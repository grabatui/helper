import React from "react";

class FormComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            errors: {},
        };

        this.processException = this.processException.bind(this);
        this.getError = this.getError.bind(this);
    }

    processException(exception) {
        this.setState((state) => {
            return {
                ...state,
                errors: exception.errors || {},
            };
        })
    }

    getError(code) {
        return (this.state.errors && this.state.errors.hasOwnProperty(code)) ?
            this.state.errors[code] :
            [];
    }
}

export default FormComponent;
