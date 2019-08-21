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
            <section className="section">
                <div className="container">
                    <Header />
                    {this.props.children}
                    <Footer />
                </div>
            </section>
        );
    }
}

export default LayoutComponent;
