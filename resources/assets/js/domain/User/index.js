import request from "../../modules/Request";
import {GET, POST} from "../../modules/Request/httpMethods";

export const get = async () => {
    return await request({
        url: `/api/user/get`,
        method: GET,
    });
};

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
