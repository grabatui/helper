import {GET} from "./httpMethods";
import * as axios from "axios";
import makeOptions from "./makeOptions";
import parseResponse from "./parseResponse";

const request = async ({url, parameters, method = GET, data = null, headers = {}}) => {
    const options = makeOptions(headers, method, data, parameters);

    const response = await axios({
        method,
        url,
        ...options,
    }).catch(async (error) => {
        return await parseResponse(error.response);
    });

    return await parseResponse(response);
};

export default request;
