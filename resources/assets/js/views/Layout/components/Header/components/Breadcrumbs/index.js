import React from "react";
import PropTypes from "prop-types";

class BreadcrumbsComponent extends React.Component {
    render() {
        return (
            <div className="hero-foot">
                <div className="container">
                    <nav className="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="/">Main</a></li>
                            <li className="is-active"><a href="#" aria-current="page">To watch</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        );
    }
}

BreadcrumbsComponent.propTypes = {
    items: PropTypes.arrayOf(PropTypes.object),
};

export default BreadcrumbsComponent;
