import React from "react";
import PropTypes from "prop-types";

class IconComponent extends React.Component {
    get classes() {
        const result = [];

        if (this.props.className) {
            result.push(this.props.className);
        }

        if (this.props.position) {
            result.push(`is-${this.props.position}`);
        }

        return result.join(` `);
    }

    render() {
        return (
            <span className={`icon ${this.classes}`}>
                <i className={this.props.code}></i>
            </span>
        );
    }
}

IconComponent.propTypes = {
    code: PropTypes.string.isRequired,
    position: PropTypes.oneOf([`left`, `right`]),
    className: PropTypes.string,
};

export default IconComponent;
