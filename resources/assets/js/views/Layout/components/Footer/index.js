import React from "react";

class FooterComponent extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        // TODO: Global store for variables (like email bottom)
        return (
            <footer className="footer has-background-light">
                <div className="content has-text-centered">
                    <p>This site was created by Grabatui for fun</p>
                    <p>You can call me by <a href="mailto:bitolyan@ya.ru" target="_blank">email</a></p>
                </div>
            </footer>
        );
    }
}

export default FooterComponent;
