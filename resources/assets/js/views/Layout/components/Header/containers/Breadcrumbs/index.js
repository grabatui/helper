import {connect} from "react-redux";

import BreadcrumbsComponent from "../../components/Breadcrumbs";

const mapStateToProps = (state) => {
    return {items: state.breadcrumbs.items};
};

export default connect(mapStateToProps)(BreadcrumbsComponent);
