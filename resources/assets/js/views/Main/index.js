import React from "react";

import Layout from "../Layout";

class MainComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        return (
            <Layout>
                <div>Hello!</div>
            </Layout>
        );
    }
}

export default MainComponent;
