import React from "react";
import ReactDOM from "react-dom";
import {createStore, combineReducers} from "redux";
import {Provider} from "react-redux";

import * as reducers from "./store/reducers";

const store = createStore(combineReducers(reducers));

import Main from "./views/Main";

ReactDOM.render(
    <Provider store={store}>
        <Main />
    </Provider>,
    document.getElementById(`application`)
);
