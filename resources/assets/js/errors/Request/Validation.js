import flatten from "lodash/flatten";

import DefaultError from "./Default";

class ValidationError extends DefaultError {
    constructor(response) {
        super(response.message);

        this.errors = response.errors;
        this.flatErrors = flatten(this.errors);

        this.fields = new Set(
            flatten(Object.keys(this.errors || {}).map((name) => [name, name.split(`.`)[0]]))
        );
    }
}

export default ValidationError;
