import React from "react";
import PropTypes from "prop-types";
import IconComponent from "../../Icon";

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

            return {
                ...state,
                classes,
            };
        });
    }

    componentDidUpdate(prevProps, prevState, snapshot) {
        let inputClass = `input`;

        if (this.props.error) {
            inputClass += ` is-danger`;
        }

        if (prevState.classes.input !== inputClass) {
            this.setState((state) => {
                state.classes.input = inputClass;

                return state;
            });
        }
    }

    render() {
        const {id, label, type, icon, field, error, ...additional} = this.props;
        const classes = this.state.classes;

        return (
            <div className={classes.wrapper}>
                <label
                    className={classes.label}
                    htmlFor={id}
                >{label}</label>

                <div className={classes.fieldWrapper}>
                    <input
                        id={id}
                        className={classes.input}
                        type={type}
                        {...field}
                        {...additional}
                    />

                    {icon && icon.code && <IconComponent {...icon} />}
                </div>

                {error && (
                    <p className="help is-danger">{error}</p>
                )}
            </div>
        );
    }
}

FieldComponent.propTypes = {
    id: PropTypes.oneOfType([PropTypes.string, PropTypes.number]),
    field: PropTypes.object,
    label: PropTypes.string,
    type: PropTypes.string,
    classes: PropTypes.objectOf(PropTypes.object),
    icon: PropTypes.shape({
        position: PropTypes.string,
        code: PropTypes.string,
    }),
    error: PropTypes.string,
};

FieldComponent.defaultProps = {
    type: `text`,
};

export default FieldComponent;
