export const HEAD = `HEAD`;
export const OPTIONS = `OPTIONS`;
export const GET = `GET`;
export const POST = `POST`;
export const PUT = `PUT`;
export const DELETE = `DELETE`;

export const isRead = (method) => {
    return ([HEAD, OPTIONS, GET].indexOf(method) >= 0);
};

export const isWrite = (method) => {
    return !isRead(method);
};
