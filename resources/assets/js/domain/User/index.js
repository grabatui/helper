import request from "../../modules/Request";
import {POST} from "../../modules/Request/httpMethods";

export const auth = async (data) => {
    return await request({
        url: `/api/user/auth`,
        method: POST,
        data: data,
    });
};
