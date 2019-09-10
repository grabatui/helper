import React from "react";
import PropTypes from "prop-types";
import {Formik, Form, Field} from "formik";
import {register} from "../../../../../domain/User";

import CustomField from "../../../../../components/Form/Field";
import FormComponent from "../../../../../components/Form";

class RegistrationComponent extends FormComponent {
    constructor(props) {
        super(props);

        this.onSubmit = this.onSubmit.bind(this);
    }

    onSubmit(values) {
        register(values)
            .then((result) => {
                // TODO
            })
            .catch(this.processException);
    }

    render() {
        return this.props.isOpened ? (
            <Formik
                onSubmit={this.onSubmit}
                render={() => (
                    <Form>
                        <Field
                            component={CustomField}

                            id="register-email"
                            name="email"
                            type="email"
                            placeholder="51neo42@gmail.com"
                            label="Email"
                            icon={{
                                code: `fas fa-envelope`,
                                position: `left`,
                                className: `is-small`,
                            }}
                            error={this.getError(`email`)}
                        />

                        <Field
                            component={CustomField}

                            id="register-password"
                            name="password"
                            type="password"
                            placeholder="******"
                            label="Password"
                            icon={{
                                code: `fas fa-lock`,
                                position: `left`,
                                className: `is-small`,
                            }}
                            error={this.getError(`email`)}
                        />

                        <Field
                            component={CustomField}

                            id="register-repeat-password"
                            name="password_confirmation"
                            type="password"
                            placeholder="******"
                            label="Password"
                            icon={{
                                code: `fas fa-lock`,
                                position: `left`,
                                className: `is-small`,
                            }}
                            error={this.getError(`email`)}
                        />

                        <div className="field is-grouped is-grouped-right">
                            <div className="control">
                                <button className="button is-primary" type="submit">Register</button>
                            </div>
                        </div>
                    </Form>
                )}
            />
        ) : (
            <h2 className="title is-4 has-text-centered">
                <a href="#" className="has-text-info" onClick={this.props.onOpenClick}>...or sign up</a>
            </h2>
        );
    }
}

RegistrationComponent.propTypes = {
    isOpened: PropTypes.bool.isRequired,
    onOpenClick: PropTypes.func.isRequired,
};

export default RegistrationComponent;
