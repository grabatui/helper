import React from "react";

class ErrorBoundaryComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {hasErrors: false};
    }

    static getDerivedStateFromError() {
        return {hasErrors: true};
    }

    render() {
        if (this.state.hasErrors) {
            return this.props.onError ? this.props.onError() : <div>Непредвиденная ошибка!</div>;
        }

        return this.props.children;
    }
}

export default ErrorBoundaryComponent;
