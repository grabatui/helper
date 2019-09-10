import React from "react";

import SearchComponent from "./components/Search";
import LoginComponent from "./components/Login";
import BreadcrumbsComponent from "./components/Breadcrumbs";

class HeaderComponent extends React.Component {
    render() {
        return (
            <section className="hero">
                <div className="hero-body">
                    <div className="container">
                        <div className="field is-grouped">
                            <div className="control is-uppercase has-text-centered">
                                <a href="/" className="title is-5">
                                    <p>Search</p>
                                    <p>The Movie</p>
                                </a>
                            </div>

                            <SearchComponent />

                            {/*TODO: Correct loggedIn*/}
                            <LoginComponent loggedIn={false} />
                        </div>
                    </div>
                </div>

                <BreadcrumbsComponent />
            </section>
        );
    }
}

export default HeaderComponent;
