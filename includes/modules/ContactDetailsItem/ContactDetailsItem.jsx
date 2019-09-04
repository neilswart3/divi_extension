// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class ContactDetailsItem extends Component {

  static slug = 'divex_contactdetails_item';

  render() {

    const utils = window.ET_Builder.API.Utils;

    let text = this.props.text;
    let fontIcon = utils.processFontIcon(this.props.font_icon);
    let iconColor = this.props.icon_color;
    let iconStyle = { color: iconColor };
    let url = this.props.url;

    return (
      <Fragment>
        <li className="divex_contactdetails_item">
          <a href={url}>
            <span className="et-pb-icon" style={iconStyle}>{fontIcon}</span>
            <span>{text}</span>
          </a>
        </li>
      </Fragment>
    );
  }

}

export default ContactDetailsItem;
