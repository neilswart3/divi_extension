// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class TextHeader extends Component {

  static slug = 'divex_textheader';

  render() {
    const HeaderTag = `${this.props.header_level}`;

    let headerText = this.props.heading;

    return (
      <Fragment>
        <div className="divex_textheader">
          <HeaderTag className="et_pb_module_header">{headerText}</HeaderTag>
        </div>
      </Fragment>
    );
  }

}

export default TextHeader;
