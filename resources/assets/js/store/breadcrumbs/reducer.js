import Immutable from "seamless-immutable";

import {ADD_BREADCRUMB_ITEM} from "./actions";

const initialState = Immutable({items: []});

export default function reduce(state = initialState, action = {}) {
    switch (action.type) {
        case ADD_BREADCRUMB_ITEM:
            return Object.assign({}, state, {
                items: [
                    ...state.items,
                    action.item,
                ],
            });

        default:
            return state;
    }
}
