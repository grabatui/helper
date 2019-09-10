import React from "react";
import {Formik, Form, Field} from "formik";
import {auth} from "../../../../../domain/User";

import CustomField from "../../../../../components/Form/Field";

class AuthorizationComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            errors: {},
        };

        this.onSubmit = this.onSubmit.bind(this);
        this.getError = this.getError.bind(this);
        this.processException = this.processException.bind(this);
    }

    onSubmit(values) {
        auth(values)
            .then((result) => {
                // TODO
            })
            .catch(this.processException);
    }

    processException(exception) {
        this.setState((state) => {
            return {
                ...state,
                errors: exception.errors || {},
            };
        })
    }

    getError(code) {
        return (this.state.errors && this.state.errors.hasOwnProperty(code)) ?
            this.state.errors[code].join(`, `) :
            '';
    }

    render() {
        return (
            <Formik
                onSubmit={this.onSubmit}
                render={() => (
                    <div>
                        <h2 className="title is-4 has-text-centered">Sign in</h2>

                        <Form>
                            <Field
                                component={CustomField}

                                id="login-email"
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

                                id="login-password"
                                name="password"
                                type="password"
                                placeholder="******"
                                label="Password"
                                icon={{
                                    code: `fas fa-lock`,
                                    position: `left`,
                                    className: `is-small`,
                                }}
                                error={this.getError(`password`)}
                            />

                            <div className="field is-grouped is-grouped-right">
                                <div className="control">
                                    <button className="button is-text">Forgot password</button>
                                </div>

                                <div className="control">
                                    <button className="button is-primary" type="submit">Login</button>
                                </div>
                            </div>
                        </Form>
                    </div>
                )}
            />
        );
    }
}

export default AuthorizationComponent;
