import React from "react";
import { render, unmountComponentAtNode } from "react-dom";
import { act } from "react-dom/test-utils";

import Hello from "./hello";

class Square extends React.Component {
    render() {
      return (
        <button className="square" onClick={function() { console.log('kliknięto w przycisk'); }}>
          {this.props.value}
        </button>
      );
    }
  }