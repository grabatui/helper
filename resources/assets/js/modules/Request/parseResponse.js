import status from "http-status";

import DefaultError from "../../errors/Request/Default";
import ValidationError from "../../errors/Request/Validation";
import TooManyRequestsError from "../../errors/Request/TooManyRequests";

const parseResponse = async (response) => {
    if (response.status === status.TOO_MANY_REQUESTS) {
        throw new TooManyRequestsError(response);
    }

    const text = await response.text();

    let json;

    try {
        json = JSON.parse(text);
    } catch (error) {
        throw new DefaultError(`Не удалось разобрать ответ от сервера)}`);
    }

    if (response.status === status.UNPROCESSABLE_ENTITY) {
        throw new ValidationError(json);
    }

    if (response.status >= 400) {
        throw new DefaultError(json.description || `Ошибка обращения к серверу`);
    }

    if (json && json.type === `error`) {
        throw new ValidationError(json);
    }

    return json;
};

export default parseResponse;
