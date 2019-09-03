import isPlainObject from "lodash/isPlainObject";
import isArray from "lodash/isArray";
import transform from "lodash/transform";
import {isWrite, POST} from "./httpMethods";
import getToken from "./csrf";

const collectFormData = (formData, value, key, object, prefix = '') => {
    if (isPlainObject(value)) {
        transform(value, (innerFormData, innerValue, innerKey, innerObject) => {
            return collectFormData(innerFormData, innerValue, innerKey, innerObject, key);
        }, formData);
    } else {
        formData.append((prefix) ? prefix + '[' + key + ']' : key, value);
    }
};

const makeOptions = (headers, method, data, params) => {
    headers = {
        Accept: `application/json`,
        'X-Requested-With': `XMLHttpRequest`,
        ...headers,
    };

    if (isWrite(method)) {
        if (!data) {
            data = {};
        }

        if (data instanceof FormData) {
            data.append(`_token`, getToken());
            data.append(`_method`, method);
        } else {
            data._token = getToken();
            data._method = method;
        }

        method = POST;
    }

    if (isPlainObject(data) || isArray(data)) {
        data = transform(data, collectFormData, new FormData());
    }

    return {method, data, headers, params};
};

export default makeOptions;
