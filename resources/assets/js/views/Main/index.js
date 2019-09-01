import React from "react";
import {connect} from "react-redux";

import Layout from "../Layout";
import {componentDispatch} from "../../store/breadcrumbs/actions";

class MainComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    componentDidMount() {
        // TODO: After adding react-rooter, add router item
        this.props.addBreadcrumb({text: 'Main'});
    }

    render() {
        return (
            <Layout>
                <div>Hello!</div>
            </Layout>
        );
    }
}

export default connect(undefined, componentDispatch)(MainComponent);
