import React from "react";
import PropTypes from "prop-types";
import {Field} from "formik";

class FieldComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            icon: {},
            classes: {
                wrapper: `field`,
                label: `label`,
                fieldWrapper: `control`,
                input: `input`,
            },
        };
    }

    componentDidMount() {
        if (!this.props.icon || !this.props.icon.position) {
            return;
        }

        this.setState((state) => {
            let classes = state.classes;

            const icon = this.props.icon;

            classes.fieldWrapper += ` has-icons-${icon.position}`;
            classes.icon += ` is-${icon.position}`;

            if (icon.class) {
                classes.icon += ` ${icon.class}`;
            }

            return {
                ...state,
                classes,
            };
        });
    }

    render() {
        const {id, label, type, icon, ...additional} = this.props;
        const classes = this.state.classes;

        return (
            <div className={classes.wrapper}>
                <label
                    className={classes.label}
                    htmlFor={id}
                >{label}</label>

                <div className={classes.fieldWrapper}>
                    <Field
                        className={classes.input}
                        type={type}
                        id={id}
                        {...additional}
                    />

                    {icon && icon.code && (
                        <span className={`icon ${classes.icon}`}>
                            <i className={icon.code}></i>
                        </span>
                    )}
                </div>
            </div>
        );
    }
}

FieldComponent.propTypes = {
    id: PropTypes.oneOfType([PropTypes.string, PropTypes.number]),
    label: PropTypes.string,
    type: PropTypes.string,
    classes: PropTypes.objectOf(PropTypes.object),
    icon: PropTypes.shape({
        position: PropTypes.string,
        code: PropTypes.string,
    }),
};

FieldComponent.defaultProps = {
    input: `input`,
    type: `text`,
};

export default FieldComponent;
