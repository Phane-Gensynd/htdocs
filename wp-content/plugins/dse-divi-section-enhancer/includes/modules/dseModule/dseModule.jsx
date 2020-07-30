// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies

import './style.css';
import jQuery from 'jquery';


class dseModule extends Component {

  static slug = 'dseModule';


  render() {
    const utils = window.ET_Builder.API.Utils;




      return (
        <React.Fragment>
          <div class="dse_module dse_vb_module">DSE</div>
        </React.Fragment>
      );

  }

  componentDidMount(){



  }


}

export default dseModule;
