import React from "react";

class SearchComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        return (
            <React.Fragment>
                <div className="control is-expanded">
                    <input type="text" className="input is-medium" placeholder="Type some movie name..."/>
                </div>

                <div className="control">
                    <button className="button is-primary is-medium" title="Search">
                        <span className="icon">
                            <i className="fas fa-search"></i>
                        </span>
                    </button>
                </div>
            </React.Fragment>
        );
    }
}

export default SearchComponent;
