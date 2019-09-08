import request from "../../modules/Request";
import {POST} from "../../modules/Request/httpMethods";

export const auth = async (data) => {
    return await request({
        url: `/api/auth/login`,
        method: POST,
        data: data,
    });
};

export const register = async (data) => {
    return await request({
        url: `/api/auth/register`,
        method: POST,
        data: data,
    });
};
