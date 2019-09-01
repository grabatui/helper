import React from "react";

import Header from "./components/Header";
import Footer from "./components/Footer";

import ErrorBoundary from "../../components/ErrorBoundary";

class LayoutComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        return (
            <React.Fragment>
                <main>
                    <Header />

                    {this.props.children}
                </main>

                <Footer />
            </React.Fragment>
        );
    }
}

export default LayoutComponent;
