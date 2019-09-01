export const ADD_BREADCRUMB_ITEM = 'ADD_BREADCRUMB_ITEM';

export function addBreadcrumb(item) {
    return {type: ADD_BREADCRUMB_ITEM, item};
}

export function componentDispatch(dispatch) {
    return {
        addBreadcrumb: (item) => {
            dispatch(addBreadcrumb(item))
        }
    }
}
