import DefaultError from "./Default";

class TooManyRequests extends DefaultError{
    constructor(response) {
        super(`Слишком много запросов`);

        this.retryAfter = +response.headers.get(`retry-after`);
    }
}

export default TooManyRequests;
