// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class ContactDetails extends Component {

  static slug = 'divex_contactdetails';

  render() {
    const HeaderTag = `${this.props.header_level}`;

    let headerText = this.props.heading;
    let content = this.props.content;

    return (
      <Fragment>
        <div className="divex_contactdetails">
          <HeaderTag className="et_pb_module_header">{headerText}</HeaderTag>
          <ul className="divex_contactdetails_inner">{content}</ul>
        </div>
      </Fragment>
    );
  }

}

export default ContactDetails;
