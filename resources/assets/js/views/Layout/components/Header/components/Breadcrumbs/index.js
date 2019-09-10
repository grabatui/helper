import React from "react";
import PropTypes from "prop-types";
import {connect} from "react-redux";

class BreadcrumbsComponent extends React.Component {
    render() {
        return (
            <div className="hero-foot">
                <div className="container">
                    <nav className="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                        <ul>
                            {this.props.items && this.props.items.map((item) => {
                                return <li key={item.text}><a href={item.url}>{item.text}</a></li>
                            })}
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

const mapStateToProps = (state) => {
    return {items: state.breadcrumbs.items};
};

export default connect(mapStateToProps)(BreadcrumbsComponent);
