// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class TextHeader extends Component {

  static slug = 'divex_text_header';

  render() {
    const HeaderTag = `${this.props.header_level}`;

    let header_text = this.props.heading;

    return (
      <Fragment>
        <div className="divex_text_header">
          <HeaderTag className="et_pb_module_header">{header_text}</HeaderTag>
        </div>
      </Fragment>
    );
  }

}

export default TextHeader;
